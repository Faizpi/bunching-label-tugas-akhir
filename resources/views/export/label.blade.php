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
                left: 200;
                top: -10;
            }
            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div id="section-to-print">
        <img src="data:image/png;base64,{{\DNS1D::getBarcodePNG($label->lot_number, 'C128')}}" alt="barcode" />
        <p>{{$label->lot_number}}</p>
        <table>
            <tr><td>Type/Size</td><td>:</td><td>{{$label->type_size}}</td></tr>
            <tr><td>Length</td><td>:</td><td>{{$label->length}}</td></tr>
            <tr><td>Weight</td><td>:</td><td>{{$label->weight}}</td></tr>
            <tr><td>Date/Shift</td><td>:</td><td>{{$label->shift_date}} / {{$label->shift}}</td></tr>
            <tr><td>Machine No</td><td>:</td><td>{{$label->machine_number}}</td></tr>
            <tr><td>Lot No</td><td>:</td><td>{{$label->formated_lot_number}}</td></tr>
            <tr><td>Pitch</td><td>:</td><td>{{$label->pitch}} mm</td></tr>
            <tr><td>Direction</td><td>:</td><td>{{$label->direction}}</td></tr>
            <tr><td>Visual</td><td>:</td><td>{{$label->visual}}</td></tr>
            <tr><td>Operator</td><td>:</td><td>{{$label->operator->name}}</td></tr>
            <tr><td>QC Test</td><td>:</td><td>{{$label->bobin_no}}</td></tr>
            <tr><td>Remark</td><td>:</td><td>{{$label->remark}}</td></tr>
        </table>
    </div>

    <button type="button" onClick="window.print();">Cetak</button>
</body>
</html>
