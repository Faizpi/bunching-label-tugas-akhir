<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Label</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<style>
    body {
        font-size: 12px;
        margin: 20px;
    }

    h4 {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
        text-align: center;
    }

    /* Tambahan untuk otomatis landscape */
    @page {
        size: A4 landscape;
        margin: 10mm;
    }
</style>

</head>

<body onload="window.print()">

    <h1 class="text-center">Laporan Data Label</h1>
    @if($start && $end)
        <p class="text-center">Periode: {{ $start }} s/d {{ $end }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Lot Number</th>
                <th>Formatted Lot Number</th>
                <th>Type/Size</th>
                <th>Length</th>
                <th>Weight</th>
                <th>Shift Date</th>
                <th>Shift</th>
                <th>Machine Number</th>
                <th>Pitch</th>
                <th>Visual</th>
                <th>Remark</th>
                <th>Bobin No</th>
                <th>Operator Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($labels as $label)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $label->lot_number }}</td>
                    <td>{{ $label->formated_lot_number }}</td>
                    <td>{{ $label->type_size }}</td>
                    <td>{{ $label->length }} M</td>
                    <td>{{ $label->weight }} KG</td>
                    <td>{{ $label->shift_date }}</td>
                    <td>{{ $label->shift }}</td>
                    <td>{{ $label->machine_number }}</td>
                    <td>{{ $label->pitch }}</td>
                    <td>{{ $label->visual }}</td>
                    <td>{{ $label->remark }}</td>
                    <td>{{ $label->bobin_no }}</td>
                    <td>{{ $label->operator->name ?? '-' }}</td>
                    <td>{{ $label->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="16">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>