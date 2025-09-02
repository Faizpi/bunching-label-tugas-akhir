<!DOCTYPE html>
<html>

<head>
    <title>Data Label PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Data Label</h2>
    <table>
        <thead>
            <tr>
                <th>No</th> <!-- 🔹 Tambah kolom nomor urut -->
                <th>ID</th>
                <th>Lot Number</th>
                <th>Formatted</th>
                <th>Size</th>
                <th>Length</th>
                <th>Weight</th>
                <th>Shift Date</th>
                <th>Shift</th>
                <th>Machine</th>
                <th>Pitch</th>
                <th>Direction</th>
                <th>Visual</th>
                <th>Remark</th>
                <th>Bobin No</th>
                <th>Operator</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labels as $label)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- 🔹 Nomor urut otomatis -->
                <td>{{ $label->id }}</td>
                <td>{{ $label->lot_number }}</td>
                <td>{{ $label->formated_lot_number }}</td>
                <td>{{ $label->size }}</td>
                <td>{{ $label->length }}</td>
                <td>{{ $label->weight }}</td>
                <td>{{ $label->shift_date }}</td>
                <td>{{ $label->shift }}</td>
                <td>{{ $label->machine_number }}</td>
                <td>{{ $label->pitch }}</td>
                <td>{{ $label->direction }}</td>
                <td>{{ $label->visual }}</td>
                <td>{{ $label->remark }}</td>
                <td>{{ $label->bobin_no }}</td>
                <td>{{ $label->operator->name ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>