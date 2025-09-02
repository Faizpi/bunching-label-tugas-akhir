@extends('web.layout.main')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Import Pengguna Baru</h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('web.user.bulk_import_post') }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 pr-1">
                            <div class="form-group">
                                <label for="excel">File Excel</label>
                                <input type="file" class="form-control" accept=".xlsx,.xls" name="excel" id="excel" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-round pull-right">Import</button>
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
@endpush

@push('scripts')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('#email').on('change', function() {
        var val = $(this).val();

        $('#password_confirmation').val(val);
        $('#password').val(val);
    });
    $('[data-type=date]').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });
</script>
@endpush