<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nomor Anggota</td>
            <td>Nama</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $no => $user)
        <tr>
            <td>{{$no+1}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>