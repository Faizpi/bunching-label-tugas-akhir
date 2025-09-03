<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LabelExport;
use App\Label;
use App\Increment;

class IndexController extends Controller
{
    /** 🔹 DASHBOARD */
    public function index(Request $req)
    {
        $user = auth()->user();

        $labels = Label::with('operator')->orderBy('id', 'desc');

        // kalau mau filter khusus operator
        // if(!$user->isAdmin()) {
        //     $labels->where('operator_id', $user->id);
        // }

        if ($req->filled('search') || $req->search === "0") {
            $labels->where('lot_number', 'like', '%' . $req->search . '%');
        }

        $labels = $labels->paginate(10);

        return view('web.dashboard.index', compact("labels"));
    }

    /** 🔹 PRINT SATU LABEL */
    public function print(Request $req)
    {
        $last_number = $this->getIncrement($req->machine_number);
        $pharse = $req->lot_not;

        $user = auth()->user();

        $label = new Label;
        $label->lot_number = $req->machine_number . date('ymd', strtotime($req->shift_date)) . $pharse;
        $label->formated_lot_number = $req->machine_number . "-" . date('y-m-d', strtotime($req->shift_date)) . "-" . $pharse;
        $label->size = $req->size;
        $label->length = $req->length;
        $label->weight = $req->weight;
        $label->shift_date = $req->shift_date;
        $label->shift = $req->shift;
        $label->machine_number = $req->machine_number;
        $label->pitch = $req->pitch;
        $label->direction = $req->direction;
        $label->visual = $req->visual;
        $label->remark = $req->remark;
        $label->bobin_no = $req->bobin_no;
        $label->operator_id = $user->id;
        $label->save();

        $this->updateIncrement($last_number, $req->machine_number);

        return view('export.label', ['label' => $label]);
    }

    public function dataLabel(Request $request)
    {
        $labels = Label::with('operator')
            ->when($request->search, function ($q) use ($request) {
                return $q->where('lot_number', 'like', "%{$request->search}%");
            })
            ->paginate(10);
        return view('web.label.index', compact('labels'));
    }



    public function edit($label)
    {
        $label = Label::find($label);
        if (!$label) {
            return redirect()->route("web.dashboard.index");
        }

        return view('web.dashboard.edit', compact("label"));
    }


    public function update(Request $req, $label)
    {
        $user = auth()->user();
        $label = Label::find($label);
        if (!$label) {
            return redirect()->route("web.dashboard.index");
        }

        $pharse = $req->lot_not;

        $label->lot_number = $req->machine_number . date('ymd', strtotime($req->shift_date)) . $pharse;
        $label->formated_lot_number = $req->machine_number . "-" . date('y-m-d', strtotime($req->shift_date)) . "-" . $pharse;
        $label->size = $req->size;
        $label->length = $req->length;
        $label->weight = $req->weight;
        $label->shift_date = $req->shift_date;
        $label->shift = $req->shift;
        $label->machine_number = $req->machine_number;
        $label->pitch = $req->pitch;
        $label->direction = $req->direction;
        $label->visual = $req->visual;
        $label->remark = $req->remark;
        $label->bobin_no = $req->bobin_no;
        $label->operator_id = $user->id;
        $label->save();

        return view('export.label', ['label' => $label]);
    }


    public function updateOnly(Request $req, $label)
    {
        $user = auth()->user();
        $label = Label::find($label);
        if (!$label) {
            return redirect()->route("web.dashboard.index");
        }

        $last_number = intval(substr($label->lot_number, -3));
        $pharse = $this->pharseLastNumber($last_number);

        $label->lot_number = $req->machine_number . date('ymd', strtotime($req->shift_date)) . $pharse;
        $label->formated_lot_number = $req->machine_number . "-" . date('y-m-d', strtotime($req->shift_date)) . "-" . $pharse;
        $label->size = $req->size;
        $label->length = $req->length;
        $label->weight = $req->weight;
        $label->shift_date = $req->shift_date;
        $label->shift = $req->shift;
        $label->machine_number = $req->machine_number;
        $label->pitch = $req->pitch;
        $label->direction = $req->direction;
        $label->visual = $req->visual;
        $label->remark = $req->remark;
        $label->bobin_no = $req->bobin_no;
        $label->operator_id = $user->id;
        $label->save();

        return redirect()->route("web.dashboard.index");
    }


    public function delete($label)
    {
        $label = Label::find($label);
        if ($label) {
            $label->delete();
        }

        return redirect()->route('web.dashboard.index');
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        return Excel::download(
            new LabelExport($startDate, $endDate),
            'data_label_.xlsx'
        );
    }

    public function exportPDF(Request $request)
    {
        ini_set('max_execution_time', 120);
        ini_set('memory_limit', '1024M');

        $query = Label::with('operator');

        // 🔹 Kalau ada filter tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('shift_date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $labels = $query->orderBy('id', 'desc')->limit(1024)->get();

        $pdf = Pdf::loadView('export.label_pdf', compact('labels'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('data_label.pdf');
    }

    public function printView(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $query = Label::with('operator');

        if ($start && $end) {
            $query->whereBetween('shift_date', [$start, $end]);
        }

        $labels = $query->orderBy('created_at', 'desc')->get();

        return view('web.label.print', compact('labels', 'start', 'end'));
    }


    /** Helpers */
    private function getIncrement($machine_number)
    {
        $increment = Increment::where("machine_number", $machine_number)->first();
        if (!$increment) {
            return 1;
        }

        return $increment->last_number >= 4 ? 1 : $increment->last_number + 1;
    }

    private function updateIncrement($last, $machine_number)
    {
        $increment = Increment::where("machine_number", $machine_number)->first();
        if (!$increment) {
            $increment = new Increment;
        }

        $increment->last_number = $last;
        $increment->machine_number = $machine_number;
        $increment->save();
    }

    private function pharseLastNumber($number)
    {
        if ($number < 10) {
            return '00' . $number;
        } elseif ($number < 100) {
            return '0' . $number;
        }
        return $number;
    }
}
