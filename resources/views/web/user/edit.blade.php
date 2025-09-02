@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box"
            style="border:1px solid #e5e7eb;
                    border-radius:12px;
                    padding:20px;
                    box-shadow:0 4px 10px rgba(0,0,0,0.05);">
            <div class="box-header with-border"
                style="margin-bottom:15px;
                        display:flex;
                        align-items:center;">
                <h3 class="box-title v-align-middle"
                    style="margin:0;
                           font-weight:700;
                           color:#0284c7;">
                    Edit Anggota
                </h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                <div class="alert alert-danger" role="alert"
                    style="border-radius:6px;
                                padding:10px 15px;
                                font-size:14px;">
                    {{$errors->first()}}
                </div>
                @endif

                <form method="POST" enctype="multipart/form-data" action="{{ route('web.user.update', [$user->id]) }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="name" style="font-weight:600;">Name</label>
                                <input type="text" class="form-control"
                                    style="border-radius:6px !important;"
                                    value="{{$user->name}}"
                                    name="name" id="name"
                                    placeholder="Ex: Fulan" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="nsk" style="font-weight:600;">NSK</label>
                                <input type="text" class="form-control"
                                    style="border-radius:6px !important;"
                                    value="{{$user->nsk}}"
                                    name="nsk" id="nsk"
                                    placeholder="Ex: 1234567" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="role" style="font-weight:600;">Role Pengguna</label>
                                <select class="form-control" name="role" id="role" required
                                    style="border-radius:6px !important;">
                                    <option disabled>Pilih Role</option>
                                    @foreach(\App\Constans\UserRole::LIST as $i => $status)
                                    <option value="{{$i}}" {{$i == $user->role ? 'selected':''}}>{{ucfirst($status)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="password" style="font-weight:600;">Password</label>
                                <input type="password" class="form-control"
                                    style="border-radius:6px !important;"
                                    name="password" id="password" autocomplete="off">
                                <small class="help-text">Biarkan kosong jika tidak ingin merubah password.</small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="password_confirmation" style="font-weight:600;">Konfirmasi Password</label>
                                <input type="password" class="form-control"
                                    style="border-radius:6px !important;"
                                    name="password_confirmation" id="password_confirmation" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:15px;">
                        <div class="col-sm-12">
                            {{ csrf_field() }}
                            <button type="reset"
                                class="btn btn-sm"
                                style="background:#facc15;
                                           color:#000;
                                           border:none;
                                           font-weight:600;
                                           border-radius:6px;
                                           padding:0.4rem 1rem;
                                           margin-right:10px;
                                           box-shadow:0 2px 6px rgba(0,0,0,0.15);">
                                Batal
                            </button>
                            <button type="submit"
                                class="btn btn-sm"
                                style="background:#0284c7;
                                           color:#fff;
                                           border:none;
                                           font-weight:600;
                                           border-radius:6px;
                                           padding:0.4rem 1rem;
                                           box-shadow:0 2px 6px rgba(0,0,0,0.2);">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('[data-type=date]').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });
</script>
@endpush