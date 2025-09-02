<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="width: 100%">
    <div id="section-to-print" style="width: 300px; display:block; margin:auto;">
        <img style="display: block; margin: auto;width: 60%;height: 40px;" src="data:image/png;base64,{{\DNS1D::getBarcodePNG($label->lot_number, 'C128')}}" alt="barcode" />
        <p style="margin-top: 10px;margin-bottom: 10px;text-align:center;"><strong>{{$label->lot_number}}</strong></p>
        <table border="0" style="width: 100%; font-size:14px;">
            <tr>
                <td>Type/Size</td>
                <td>:</td>
                <td>{{$label->size}}</td>
            </tr>
            <tr>
                <td>Length</td>
                <td>:</td>
                <td>{{$label->length}}</td>
            </tr>
            <tr>
                <td>Weight</td>
                <td>:</td>
                <td>{{$label->weight}}</td>
            </tr>
            <tr>
                <td>Date/Shift</td>
                <td>:</td>
                <td>{{$label->shift_date}}/{{$label->shift}}</td>
            </tr>
            <tr>
                <td>Machine No</td>
                <td>:</td>
                <td>{{$label->machine_number}}</td>
            </tr>
            <tr>
                <td>Lot No</td>
                <td>:</td>
                <td>{{$label->formated_lot_number}}</td>
            </tr>
            <tr>
                <td>Pitch</td>
                <td>:</td>
                <td>{{$label->pitch}} mm</td>
            </tr>
            <tr>
                <td>Direction</td>
                <td>:</td>
                <td>{{$label->direction}}</td>
            </tr>
            <tr>
                <td>Visual</td>
                <td>:</td>
                <td>{{$label->visual}}</td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>:</td>
                <td>{{$label->operator->name}}</td>
            </tr>
            <tr>
                <td>QC Test</td>
                <td>:</td>
                <td>{{$label->bobin_no}}</td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>:</td>
                <td>{{$label->remark}}</td>
            </tr>
        </table>
    </div>
    <button style="text-align:center;display:block; margin:auto; margin-top: 25px;" type="button" onClick="window.print();">Cetak</button>
</body>

<style>
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
    }
</style>

</html>