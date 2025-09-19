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

        /* Landscape */
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
                <th>ID</th>
                <th>Lot Number</th>
                <th>Formatted Lot Number</th>
                <th>Type/Size</th>
                <th>Length (m)</th>
                <th>Total Length (m)</th>
                <th>Extra Length (m)</th>
                <th>Weight (kg)</th>
                <!-- <th>Extra Weight (kg)</th> -->
                <th>Date</th>
                <th>Shift</th>
                <th>Machine Number</th>
                <th>Pitch (mm)</th>
                <th>Visual</th>
                <!-- <th>QC Test</th> -->
                <th>Remark</th>
                <th>Operator Name</th>
                <!-- <th>Created At</th> -->
                <th>Print Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse($labels as $label)
                @php
                    $lengthTotal = null;
                    if (!empty($label->length)) {
                        // contoh format: "2 x 1800" atau "2x1800"
                        $parts = preg_split('/x/i', str_replace(' ', '', $label->length));
                        if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                            $lengthTotal = $parts[0] * $parts[1];
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $label->id }}</td>
                    <td>{{ $label->lot_number }}</td>
                    <td>{{ $label->formated_lot_number }}</td>
                    <td>{{ $label->type_size }}</td>
                    <td>{{ $label->length }}</td>
                    <td>{{ $lengthTotal }}</td>
                    <td>{{ $label->extra_length }}</td>
                    <td>{{ $label->weight }}</td>
                    <!-- <td>{{ $label->extra_weight }}</td> -->
                    <!-- <td>{{ $label->shift_date }}</td> -->
                    <td>{{ \Carbon\Carbon::parse($label->shift_date)->format('d-M-Y') }}</td>
                    <td>{{ $label->shift }}</td>
                    <td>{{ $label->machine_number }}</td>
                    <td>{{ $label->pitch }}</td>
                    <td>{{ $label->visual }}</td>
                    <!-- <td>{{ $label->bobin_no }}</td> -->
                    <td>{{ $label->remark }}</td>
                    <td>{{ $label->operator->name ?? '-' }}</td>
                    <!-- <td>{{ $label->created_at }}</td> -->
                    <!-- <td>{{ \Carbon\Carbon::parse($label->created_at)->format('d-m-Y H:i') }}</td> -->
                    <td>{{ $label->print_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="15">Tidak ada data</td>
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
