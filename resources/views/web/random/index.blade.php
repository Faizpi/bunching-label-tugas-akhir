@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Acak Nomor Undian</h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <h1 id="rand_num" class="text-center text-rand">0000</h1>
                        <h1 class="text-center hidden" id="res_name"></h1>
                    </div>
                    <div class="col-sm-12 col-md-2 col-md-offset-5">
                        <button type="button" id="btn-rand" class="btn btn-primary">ACAK NOMOR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Peserta Terpilih</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. ID</th>
                            <th>Username</th>
                            <th>Terdaftar</th>
                            <th>Reset</th>
                        </tr>
                    </thead>
                    <tbody id="p-t">
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>Ya</td>
                                <td>
                                    <button type="button" data-action="delete" data-href="{{route('web.random.reset', ['id' => $u->id])}}" class="btn btn-danger">Reset</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        .text-rand {
            font-weight: bold;
            font-size: 8.5rem;
        }

        #btn-rand {
            margin: 15px auto;
            width: 100%;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).on('click', 'button[data-action=delete]', function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin akan menghapus data ?',
            text: "Hal ini tidak dapat di urungkan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.value)
                window.location.assign(url);
        });
    });
</script>
<script>
    function startRand() {
        $('#res_name').removeClass('show');
        $('#res_name').addClass('hidden');
        var rand_el = $('#rand_num');
        var rand = setInterval(function() {
            var rand_num = Math.floor((Math.random() * 9000) + 1000);
            rand_el.text(rand_num);
        }, 100);

        setTimeout(function() {
            $.ajax({
                url: '{{route("web.random.number")}}',
                method: 'GET',
                dataType: 'json',
                success: function(res) {
                    var pt = $('#p-t');
                    var reset_url = '{{route("web.random.reset")}}?id='+res.id;
                    var row = '<tr><td>'+res.name+'</td><td>'+res.email+'</td><td>Ya</td><td><button type="button" data-action="delete" data-href="'+ reset_url +'" class="btn btn-danger">Reset</button></td></tr>';
                    pt.prepend(row);

                    $('#res_name').removeClass('hidden');
                    $('#res_name').addClass('show');
                    rand_el.text(res.name);
                    $('#res_name').text(res.email);
                    clearInterval(rand);
                },
                error: function(err) {
                    clearInterval(rand);
                    rand_el.text('0000');
                    console.log(err);
                    alert('Hasil tidak ditemukan saat melakukan pengundian');
                }
            });
        }, 5000);
    }

    $('#btn-rand').on('click', function() {
        startRand();
    });
</script>
@endpush