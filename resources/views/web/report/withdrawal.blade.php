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
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </form>
            </div>
        </div>

    </div><!-- .col-sm-12 .col-md-4 -->
</div><!-- .row -->

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title v-align-middle">Laporan Pencairan Dana</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Campaign</th>
                            <th>Nominal</th>
                            <th>Penerima</th>
                            <th>Rekening Penerima</th>
                            <th>Tanggal</th>
                            <th>Pencairan Melalui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawals as $i => $withdrawal)
                            <tr>
                                @if(request()->page > 1)
                                <td>{{((intval(request()->page)*10) + $i +1) - 10}}</td>
                                @else
                                    <td>{{($i+1)}}</td>
                                @endif
                                <td>{{$withdrawal->campaign ? $withdrawal->campaign->title : '-'}}</td>
                                <td>Rp {{number_format($withdrawal->nominal)}}</td>
                                <td>{{$withdrawal->bank_account_name}}</td>
                                <td>{{$withdrawal->bank_account_number}}</td>
                                <td>{{date('d M Y', strtotime($withdrawal->created_at))}}</td>
                                <td>{{$withdrawal->bank_name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @if($withdrawals->count() > 0)
                            <td colspan="7">{{$withdrawals->appends(request()->except('page'))->links()}}</td>
                            @endif
                        </tr>
                    </tfoot>
                </table>
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
