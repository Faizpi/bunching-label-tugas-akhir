<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #section-to-print {
            width: 300px;
            display: block;
            margin: auto;
        }

        #section-to-print img {
            display: block;
            margin: auto;
            width: 60%;
            height: 40px;
            object-fit: contain;
        }

        #section-to-print p {
            margin: 8px 0 12px 0;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }

        #section-to-print table {
            width: 100%;
            font-size: 13px;
            border-collapse: collapse;
        }

        #section-to-print td {
            padding: 2px 3px;
            vertical-align: top;
        }

        #section-to-print td:first-child {
            width: 35%;
        }

        #section-to-print td:nth-child(2) {
            width: 5%;
            text-align: center;
        }

        #section-to-print td:last-child {
            width: 60%;
        }

        button {
            text-align: center;
            display: block;
            margin: 20px auto;
            padding: 6px 14px;
            font-size: 13px;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: white;
            cursor: pointer;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print,
            #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                top: 0;
                left: 50%;               
                transform: translateX(-50%) scale(0.9); 
                transform-origin: top center; 
                max-width: 260px;        
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    @php
        $baseLength = null;
        if (!empty($label->length)) {
            $parts = preg_split('/x/i', str_replace(' ', '', $label->length));
            if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $baseLength = $parts[0] * $parts[1];
            }
        }

        // Total Length = base length + extra length
        $totalLength = ($baseLength ?? 0) + ($label->extra_length ?? 0);
    @endphp

    <div id="section-to-print">
        <img src="data:image/png;base64,{{ \DNS1D::getBarcodePNG($label->lot_number, 'C128') }}" alt="barcode" />
        <p>{{ $label->lot_number }}</p>
        <table>
            <tr>
                <td>Type/Size</td>
                <td>:</td>
                <td>{!! nl2br(e($label->type_size)) !!}</td>
            </tr>
            <tr>
                <td>Length</td>
                <td>:</td>
                <td>{{ $label->length }} m</td>
            </tr>
            @if($label->extra_length)
            <tr>
                <td>Extra Length</td>
                <td>:</td>
                <td>{{ $label->extra_length }} m</td>
            </tr>
            @endif
            <tr>
                <td>Total Length</td>
                <td>:</td>
                <td>{{ $totalLength }} m</td>
            </tr>
            <tr>
                <td>Weight</td>
                <td>:</td>
                <td>{{ $label->weight }} kg</td>
            </tr>
            <tr>
                <td>Date/Shift</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($label->shift_date)->format('d-M-Y') }} / {{ $label->shift }}</td>
            </tr>
            <tr>
                <td>Machine No</td>
                <td>:</td>
                <td>{{ $label->machine_number }}</td>
            </tr>
            <tr>
                <td>Lot No</td>
                <td>:</td>
                <td>{{ $label->formated_lot_number }}</td>
            </tr>
            <tr>
                <td>Visual</td>
                <td>:</td>
                <td>{{ $label->visual }}</td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>:</td>
                <td>{{ $label->operator->name ?? '-' }}</td>
            </tr>
            <tr>
                <td>Pitch</td>
                <td>:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>QC Test</td>
                <td>:</td>
                <td>{{ $label->bobin_no }}</td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>:</td>
                <td>{{ $label->remark }}</td>
            </tr>
            <tr>
                <td>Extruder</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
    </div>

    <button type="button" onclick="window.print();">Cetak</button>
</body>

<!-- </html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 11px;
        }

        #section-to-print {
            width: 58mm; /* Lebar kertas thermal */
            margin: 0 auto;
            display: block;
            padding: 0 2mm;
        }

        #section-to-print img {
            display: block;
            margin: 0 auto 4px auto;
            width: 80%;
            height: 35px;
            object-fit: contain;
        }

        #section-to-print p {
            margin: 4px 0 6px 0;
            text-align: center;
            font-weight: bold;
            font-size: 11px;
        }

        #section-to-print table {
            width: 100%;
            font-size: 10px;
            border-collapse: collapse;
        }

        #section-to-print td {
            padding: 1px 0;
            vertical-align: top;
            line-height: 1.2;
        }

        #section-to-print td:first-child {
            width: 36%;
            white-space: nowrap;
        }

        #section-to-print td:nth-child(2) {
            width: 6%;
            text-align: center;
        }

        #section-to-print td:last-child {
            width: 58%;
            word-wrap: break-word;
        }

        button {
            text-align: center;
            display: block;
            margin: 12px auto;
            padding: 5px 10px;
            font-size: 11px;
            border: none;
            border-radius: 3px;
            background: #007bff;
            color: white;
            cursor: pointer;
        }

        @page {
            size: 58mm auto;
            margin: 0;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            body * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                top: 0;
                left: 0;
                transform: none;
                width: 58mm;
                padding: 0 2mm;
            }

            button {
                display: none;
            }
        }
    </style>
</head>
<body>
    @php
        $baseLength = null;
        if (!empty($label->length)) {
            $parts = preg_split('/x/i', str_replace(' ', '', $label->length));
            if (count($parts) == 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                $baseLength = $parts[0] * $parts[1];
            }
        }

        $totalLength = ($baseLength ?? 0) + ($label->extra_length ?? 0);
    @endphp

    <div id="section-to-print">
        <img src="data:image/png;base64,{{ \DNS1D::getBarcodePNG($label->lot_number, 'C128') }}" alt="barcode" />
        <p>{{ $label->lot_number }}</p>
        <table>
            <tr><td>Type/Size</td><td>:</td><td>{!! nl2br(e($label->type_size)) !!}</td></tr>
            <tr><td>Length</td><td>:</td><td>{{ $label->length }} m</td></tr>
            @if($label->extra_length)
            <tr><td>Extra Length</td><td>:</td><td>{{ $label->extra_length }} m</td></tr>
            @endif
            <tr><td>Total Length</td><td>:</td><td>{{ $totalLength }} m</td></tr>
            <tr><td>Weight</td><td>:</td><td>{{ $label->weight }} kg</td></tr>
            <tr><td>Date/Shift</td><td>:</td><td>{{ \Carbon\Carbon::parse($label->shift_date)->format('d-M-Y') }} / {{ $label->shift }}</td></tr>
            <tr><td>Machine No</td><td>:</td><td>{{ $label->machine_number }}</td></tr>
            <tr><td>Lot No</td><td>:</td><td>{{ $label->formated_lot_number }}</td></tr>
            <tr><td>Visual</td><td>:</td><td>{{ $label->visual }}</td></tr>
            <tr><td>Operator</td><td>:</td><td>{{ $label->operator->name ?? '-' }}</td></tr>
            <tr><td>Pitch</td><td>:</td><td>&nbsp;</td></tr>
            <tr><td>QC Test</td><td>:</td><td>{{ $label->bobin_no }}</td></tr>
            <tr><td>Remark</td><td>:</td><td>{{ $label->remark }}</td></tr>
            <tr><td>Extruder</td><td>:</td><td></td></tr>
        </table>
    </div>

    <button type="button" onclick="window.print();">Cetak</button>
</body>
</html> -->
