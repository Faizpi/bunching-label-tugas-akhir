@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Data Pengguna</h3>

                <a href="{{route('web.candidate.create')}}" class="btn btn-primary btn-sm pull-right">Tambah</a href="#">
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Divisi/Bagian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $i => $candidate)
                            <tr>
                                <td>{{($i+1)}}</td>
                                <td>
                                    <img src="{{$candidate->photo}}" alt="{{$candidate->name}}" style="width: 75px;">
                                </td>
                                <td>{{$candidate->name}}</td>
                                <td>{{\App\Constans\CandidateType::getString($candidate->type)}}</td>
                                <td>{{$candidate->division}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button action">
                                        <a title="Edit" href="{{route('web.candidate.edit', [$candidate->id])}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button title="Hapus" data-action="delete" data-href="{{route('web.candidate.delete', [$candidate->id])}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{{$candidates->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('button[data-action=delete]').click(function() {
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
@endpush