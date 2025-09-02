@extends('web.layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Filter</h3>
            </div>
            <div class="box-body table-responsive">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="from">Dari Tanggal</label>
                        <input type="text" value="{{\Request::get('from')}}" data-type="date" class="form-control input-sm" id="from" name="from" placeholder="Dari tanggal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="to">Sampai Tanggal</label>
                        <input type="text" value="{{\Request::get('to')}}" data-type="date" class="form-control input-sm" id="to" name="to" placeholder="Sampai tanggal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="status">Status</label>
                        <select class="form-control input-sm" name="status" id="status">
                            <option value="all" selected>Semua Status</option>
                            @foreach(\App\Helpers\Enums\PaymentStatus::LIST as $i => $list)
                                <option value="{{$i}}" {{\Request::get('status') != 'all' && $i == \Request::get('status') ? 'selected':''}}>{{ucfirst($list)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="gw">Gateway</label>
                        <select class="form-control input-sm" name="gw" id="gw">
                            <option value="all" selected>Semua Gateway</option>
                            @foreach(\App\Helpers\Enums\PaymentGateway::LIST as $i => $gw)
                                <option value="{{$gw}}" {{\Request::get('gw') != 'all' && \Request::get('gw') != null && $gw == \Request::get('gw') ? 'selected':''}}>{{ucfirst(\App\Helpers\Enums\PaymentGateway::getString($gw))}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="campaign">Program</label>
                        <select class="form-control input-sm" name="campaign" id="campaign">
                            <option value="all" selected>Semua Program</option>
                            @foreach($campaigns as $campaign)
                                <option value="{{$campaign->id}}" {{\Request::get('campaign') != 'all' && $campaign->id == \Request::get('campaign') ? 'selected':''}}>{{$campaign->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    <a href="{{ route('web.report.donasi.export') }}?{{http_build_query(\Request::all())}}" class="pull-right btn btn-success btn-sm">
                        <i class="fa fa-cloud-download"></i>
                        &nbsp; Export
                    </a>
                </form>
            </div>
        </div>

    </div><!-- .col-sm-12 .col-md-4 -->
</div><!-- .row -->

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Laporan Donasi Masuk</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Campaign</th>
                            <th style="width: 100px;">Dermawan</th>
                            <th>No HP/WA</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Gateway</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donors as $i => $donor)
                            <tr>
                                @if(request()->page > 1)
                                    <td>{{((intval(request()->page)*30) + $i +1) - 30}}</td>
                                @else
                                    <td>{{($i+1)}}</td>
                                @endif
                                <td>{{$donor->campaign ? $donor->campaign->title : '-'}}</td>
                                <td>{{$donor->name}}</td>
                                <td>{{$donor->user ? $donor->user->phone : '-'}}</td>
                                <td>Rp {{number_format($donor->nominal)}}</td>
                                <td>{{date('d M Y H:i', strtotime($donor->created_at))}}</td>
                                <td>{{$donor->payment ? \App\Helpers\Enums\PaymentGateway::getString($donor->payment->gateway) : '-'}}</td>
                                <td>{!! \App\Helpers\Enums\PaymentStatus::getParse($donor->status) !!}</td>
                                <td>
                                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                        <button title="Konfirmasi" data-action="confirm" data-href="{{route('web.report.donasi.confirm', [$donor->id, http_build_query(request()->all())])}}"  type="button" class="btn btn-warning" {{$donor->status != 0 ? 'disabled':''}}>
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button type="button" data-action="edit" class="btn btn-primary" data-nominal="{{$donor->nominal}}" data-href="{{route('web.report.donasi.update', [$donor->id, http_build_query(request()->all())])}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button data-action="delete" data-href="{{route('web.report.donasi.delete', [$donor->id, http_build_query(request()->all())])}}" type="button" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @if($donors->count() > 0)
                            <td colspan="9">{{$donors->appends(request()->except('page'))->links()}}</td>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="edit-nominal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Nominal</h4>
        </div>
        <div class="modal-body">
            <form id="form-edit-nominal" method="post">
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" name="nominal" id="txt_nominal" class="form-control">
                    {{csrf_field()}}
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-9">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single .select2-selection__rendered {
        margin-top: -7px;
        padding-left: 0px;
    }
</style>
@endpush

@push('scripts')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $('button[data-action=confirm]').click(function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin sudah mengkonfirmasi transaksi ?',
            text: "Hal ini tidak dapat di urungkan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Konfirmasi',
        }).then((result) => {
            if(result.value)
                window.location.assign(url);
        });
    });

    $('button[data-action=delete]').click(function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin akan menghapus data donasi ?',
            text: "Hal ini tidak dapat di urungkan",
            type: 'error',
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

    $('button[data-action=edit]').click(function() {
        var url = $(this).data('href');
        var nominal = $(this).data('nominal');

        $('#form-edit-nominal').attr('action', url);
        $('input#txt_nominal').val(nominal);

        $('#edit-nominal').modal('show');
    });

    $('[data-type=date]').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });

    $('#campaign').select2();
</script>
@endpush
