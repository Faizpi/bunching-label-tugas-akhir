@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box"
            style="background:#ffffff;
                    border-radius:10px;
                    border:1px solid #e5e7eb;
                    box-shadow:0 4px 12px rgba(0,0,0,0.08);
                    overflow:hidden;">

            <!-- Header -->
            <div class="box-header with-border d-flex justify-content-between align-items-center"
                style="background:white;
                        color:#fff;
                        padding:1rem 1.5rem;
                        border-bottom:1px solid #e5e7eb;">
                <h3 class="box-title v-align-middle"
                    style="margin:0;font-weight:600;font-size:17px;color:black;">
                    Data Pengguna
                </h3>

                <a href="{{route('web.user.create')}}"
                    class="btn btn-sm"
                    style="float:right;
                        background:#ffffff;
                        color:#0284c7;
                        border:none;
                        font-weight:600;
                        border-radius:6px;
                        padding:0.4rem 1rem;
                        box-shadow:0 2px 6px rgba(255,255,255,0.2);">
                    <i class="fa fa-plus"></i> Tambah
                </a>

            </div>

            <!-- Body -->
            <div class="box-body" style="padding:1.5rem;color:#1e293b;">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-3">
                            <form class="form-inline"
                                action="{{ route('web.user.index') }}"
                                method="GET"
                                style="gap:0.5rem;">
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') ?? '' }}"
                                    placeholder="Masukan No. ID"
                                    class="form-control input-sm"
                                    style="border-radius:6px;
                                              padding:0.4rem 0.75rem;
                                              border:1px solid #cbd5e1;
                                              background:#f8fafc;
                                              color:#1e293b;">
                                <button type="submit"
                                    class="btn btn-sm"
                                    style="background:#0284c7;
                                               border:none;
                                               border-radius:6px;
                                               padding:0.4rem 1rem;
                                               font-weight:500;
                                               color:#fff;
                                               box-shadow:0 2px 6px rgba(2,132,199,0.4);">
                                    Cari
                                </button>
                            </form>
                        </div>

                        <div class="col-sm-12 col-md-9 text-end">
                            <form class="form-inline d-flex justify-content-end"
                                action="{{ route('web.user.index') }}"
                                method="GET"
                                style="gap:0.5rem;">
                                <select name="role"
                                    id="role"
                                    class="form-control form-control-sm"
                                    style="border-radius:6px;
                                               border:1px solid #cbd5e1;
                                               background:#f8fafc;
                                               color:#1e293b;">
                                    <option value="" selected="">Semua Role</option>
                                    @foreach(\App\Constans\UserRole::LIST as $i => $role)
                                    <option value="{{$i}}" {{!is_null(request('role')) && request('role') == $i ? 'selected':''}}>
                                        {{ucfirst($role)}}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="btn btn-sm"
                                    style="background:#0284c7;
                                               border:none;
                                               border-radius:6px;
                                               padding:0.4rem 1rem;
                                               font-weight:500;
                                               color:#fff;
                                               box-shadow:0 2px 6px rgba(2,132,199,0.4);">
                                    Filter
                                </button>
                                <a href="{{route('web.user.index')}}"
                                    class="btn btn-sm"
                                    style="background:#f1f5f9;
                                          border:none;
                                          border-radius:6px;
                                          padding:0.4rem 1rem;
                                          font-weight:500;
                                          color:#475569;">
                                    Reset
                                </a>
                            </form>
                        </div>
                    </div>

                    <div class="row table-responsive">
                        <table class="table table-striped table-bordered align-middle"
                            style="margin:0;
                                      border-radius:8px;
                                      overflow:hidden;
                                      background:#ffffff;
                                      color:#1e293b;
                                      margin-top:20px;">
                            <thead style="background:#0284c7;color:#fff;">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>NSK</th>
                                    <th>Registrasi</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $i => $user)
                                <tr style="transition:all .2s ease;"
                                    onmouseover="this.style.backgroundColor='rgba(2,132,199,0.05)'"
                                    onmouseout="this.style.backgroundColor=''">
                                    <td>{{($i+1)}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->nsk}}</td>
                                    <td>{{date('d F Y', strtotime($user->created_at))}}</td>
                                    <td>
                                        <span style="background:#0284c7;
                                                         color:#fff;
                                                         padding:0.2rem 0.6rem;
                                                         border-radius:12px;
                                                         font-size:0.75rem;">
                                            {{\App\Constans\UserRole::getString($user->role)}}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button action">
                                            <a title="Edit"
                                                href="{{route('web.user.edit', [$user->id])}}"
                                                class="btn btn-sm"
                                                style="background:#f59e0b;
                                                          border:none;
                                                          border-radius:6px;
                                                          color:#fff;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button title="Hapus"
                                                data-action="delete"
                                                data-href="{{route('web.user.delete', [$user->id])}}"
                                                class="btn btn-sm"
                                                style="background:#dc2626;
                                                               border:none;
                                                               border-radius:6px;
                                                               color:#fff;
                                                               margin-left:5px;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">{{$users->appends(request()->except('page'))->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0284c7',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value)
                window.location.assign(url);
        });
    });
</script>
@endpush