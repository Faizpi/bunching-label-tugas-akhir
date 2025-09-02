@extends('web.layout.main')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Tambah Candiate Baru</h3>
            </div>
            <div class="box-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('web.candidate.insert') }}">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 pr-1">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" value="{{old('name')?old('name'):''}}" name="name" id="name" placeholder="Ex: Fulan" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 pr-1">
                            <div class="form-group">
                                <label for="division">Divisi/Bagian</label>
                                <input type="text" class="form-control" value="{{old('division')?old('division'):''}}" name="division" id="division" placeholder="Ex: Staff Research & Development" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 pr-1">
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" accept=".jpg,.png,.jpeg" class="form-control" name="photo" id="photo" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 pr-1">
                            <div class="form-group">
                                <label for="type">Tipe Kandidat</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="" selected disabled>Pilih Tipe</option>
                                    @foreach(\App\Constans\CandidateType::LIST as $i => $type)
                                        <option value="{{$i}}" {{$i == \App\Constans\CandidateType::KETUA ? 'selected':''}}>{{ucwords($type)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 pr-1">
                            <div class="form-group">
                                <label for="motto">Motto/Visi & Misi</label>
                                <textarea class="form-control" name="motto" id="motto" placeholder="Kami akan memajukan pengembangan">{{old('motto')}}</textarea>
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