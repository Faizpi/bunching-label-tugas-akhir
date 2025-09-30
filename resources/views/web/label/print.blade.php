<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Label</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-size: 12px;
            margin: 15px;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 13px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        thead th {
            background-color: #f2f2f2;
            font-weight: bold;
            border: 1.5px solid #000;
        }

        tr {
            page-break-inside: avoid;
        }

        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
            text-align: right;
        }
    </style>
</head>

<body onload="window.print()">

    {{-- Header --}}
    <div class="text-center">
        <h1>LAPORAN DATA LABEL</h1>
        <div class="sub-title">
            @if($start && $end)
                Periode: {{ $start }} s/d {{ $end }}
            @else
                Semua Periode
            @endif
        </div>
        <hr>
    </div>

    {{-- Tabel data --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Lot Number</th>
                <th>Formatted Lot Number</th>
                <th>Type/Size</th>
                <th>Drum/Coil</th>
                <th>Std Length (m)</th>
                <th>Length (m)</th>
                <th>Base Length (m)</th>
                <th>Extra Length (m)</th>
                <th>Total Length (m)</th>
                <th>Weight (kg)</th>
                <th>Date</th>
                <th>Shift</th>
                <th>Machine Number</th>
                <th>Pitch (mm)</th>
                <th>Visual</th>
                <th>Remark</th>
                <th>Operator Name</th>
                <th>Print Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse($labels as $label)
                @php
                    $drumCoil = null;
                    $stdLength = null;
                    $baseLength = null;

                    if (!empty($label->length)) {
                        // contoh: "3 x 2000" atau "3x2000"
                        $parts = preg_split('/x/i', str_replace(' ', '', $label->length));
                        if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                            $drumCoil = $parts[0];
                            $stdLength = $parts[1];
                            $baseLength = $drumCoil * $stdLength;
                        }
                    }

                    $totalLength = ($baseLength ?? 0) + ($label->extra_length ?? 0);
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $label->lot_number }}</td>
                    <td>{{ $label->formated_lot_number }}</td>
                    <td>{{ $label->type_size }}</td>
                    <td>{{ $drumCoil }}</td>
                    <td>{{ $stdLength }}</td>
                    <td>{{ $label->length }}</td>
                    <td>{{ $baseLength }}</td>
                    <td>{{ $label->extra_length }}</td>
                    <td>{{ $totalLength }}</td>
                    <td>{{ $label->weight }}</td>
                    <td>{{ \Carbon\Carbon::parse($label->shift_date)->format('d-M-Y') }}</td>
                    <td>{{ $label->shift }}</td>
                    <td>{{ $label->machine_number }}</td>
                    <td>{{ $label->pitch }}</td>
                    <td>{{ $label->visual }}</td>
                    <td>{{ $label->remark }}</td>
                    <td>{{ $label->operator->name ?? '-' }}</td>
                    <td>{{ $label->print_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="19">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer --}}
    <div class="footer">
        Dicetak pada: {{ now()->format('d-M-Y H:i') }} <br>
        Oleh: {{ auth()->user()->name ?? 'System' }}
    </div>

</body>
</html>
