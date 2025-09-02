@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Tambah Campaign Baru</h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('web.setting.update') }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="jargon">Text Jargon</label>
                                <input type="text" class="form-control" value="{{$setting ? $setting->jargon : ''}}" name="jargon" id="jargon" placeholder="Pemilihan Ketua Angkasa Pura II" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control" accept="image/*" name="logo" id="logo">
                                <span class="help-block">
                                    Biarkan kosong jika tidak ingin merubah logo.
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="start_voting">Waktu Mulai Voting</label>
                                <input type="text" data-type="datetime" class="form-control" value="{{$setting ? $setting->start_voting:''}}" name="start_voting" id="start_voting" placeholder="2020-01-24 10:00" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="end_voting">Waktu Ahir Voting</label>
                                <input type="text" data-type="datetime" class="form-control" value="{{$setting ? $setting->end_voting:''}}" name="end_voting" id="end_voting" placeholder="2020-01-24 10:00" required>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="start_confirmation">Waktu Mulai Konfirmasi</label>
                                <input type="text" data-type="datetime" class="form-control" value="{{$setting ? $setting->start_confirmation : ''}}" name="start_confirmation" id="start_confirmation" placeholder="2020-01-24 10:00" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 pr-1">
                            <div class="form-group">
                                <label for="end_confirmation">Waktu Ahir Konfirmasi</label>
                                <input type="text" data-type="datetime" class="form-control" value="{{$setting ? $setting->end_confirmation : ''}}" name="end_confirmation" id="end_confirmation" placeholder="2020-01-24 10:00" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-round pull-right">Simpan</button>
                            <button type="reset" style="margin-right: 10px;" class="btn btn-warning btn-round pull-right">Batal</button>
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
<link rel="stylesheet" href="{{asset('bundle/bootstrap-datetimepicker/css/bdt.css')}}">
@endpush

@push('scripts')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('bundle/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bundle/bootstrap-datetimepicker/js/bdt.js')}}"></script>
<script>
    $('[data-type=date]').datepicker({
        timePicker: true,
        format: 'yyyy-mm-dd hh:mm',
        autoclose: true,
        zIndexOffset: 1500
    });

    $('[data-type=datetime]').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
    });
</script>
@endpush