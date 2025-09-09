@extends('web.layout.main')
@section('content')

<div class="row" style="padding:40px 30px;">
    <div class="col-sm-12">
        <div class="box"
            style="background:#ffffff;
                    border-radius:10px;
                    border:1px solid #e5e7eb;
                    box-shadow:0 4px 12px rgba(0,0,0,0.1);
                    overflow:hidden;">

            <!-- Header -->
            <div class="box-header with-border"
                style="background:white;
                        color:#fff;
                        padding:1rem 1.5rem;
                        border-bottom:1px solid #e5e7eb;">
                <h2 class="box-title v-align-middle"
                    style="margin:0;font-weight:600;font-size:17px;letter-spacing:0.3px;color:black;">
                    Data Label
                </h2>
            </div>

            <!-- Body -->
            <div class="box-body" style="padding:1.5rem;color:white;">
                <div class="container-fluid">

                    <!-- Search & Filter -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form class="form-inline" style="gap:0.5rem;">
                                <input type="text"
                                    name="search"
                                    value="{{ request('search') ?? '' }}"
                                    placeholder="Masukan Lot No."
                                    class="form-control input-sm"
                                    style="border-radius:6px;
                                              padding:0.4rem 0.75rem;
                                              border:1px solid #cbd5e1;
                                              background:#f8fafc;
                                              color:#1e293b;">
                                <button type="submit"
                                    class="btn btn-primary btn-sm"
                                    style="background:#0284c7;
                                               border:none;
                                               border-radius:6px;
                                               padding:0.4rem 1rem;
                                               font-weight:500;
                                               box-shadow:0 2px 6px rgba(2,132,199,0.4);">
                                    Cari
                                </button>
                                <a href="{{ route('web.label.index') }}"
                                    class="btn btn-success btn-sm"
                                    style="background:#16a34a;
                                          border:none;
                                          border-radius:6px;
                                          padding:0.4rem 1rem;
                                          font-weight:500;
                                          box-shadow:0 2px 6px rgba(22,163,74,0.4);">
                                    Reset
                                </a>
                            </form>
                        </div>
                        @if (auth()->user()->role == 0)
                        <div class="col-md-6 text-right">
                            <form action="" method="GET" class="form-inline pull-right" style="gap:0.5rem;">
                                <label for="start_date" class="control-label" style="color:#475569;">Dari</label>
                                <input type="date"
                                    name="start_date" id="start_date"
                                    class="form-control input-sm"
                                    style="border-radius:6px;
                                           border:1px solid #cbd5e1;
                                           background:#f8fafc;
                                           color:#1e293b;">
                                <label for="end_date" class="control-label" style="margin-left:10px;color:#475569;">Sampai</label>
                                <input type="date"
                                    name="end_date" id="end_date"
                                    class="form-control input-sm"
                                    style="border-radius:6px;
                                           border:1px solid #cbd5e1;
                                           background:#f8fafc;
                                           color:#1e293b;">
                                <button formaction="{{ route('web.label.export.excel') }}"
                                    class="btn btn-success btn-sm"
                                    style="background:#16a34a;
                                               border:none;
                                               border-radius:6px;
                                               padding:0.4rem 1rem;
                                               font-weight:500;
                                               box-shadow:0 2px 6px rgba(22,163,74,0.4);">
                                    <i class="fa fa-file-excel-o"></i> Excel
                                </button>
                                <button formaction="{{ route('web.label.print') }}"
                                    formtarget="_blank"
                                    class="btn btn-info btn-sm"
                                    style="background:#0ea5e9;
                                               border:none;
                                               border-radius:6px;
                                               padding:0.4rem 1rem;
                                               font-weight:500;
                                               box-shadow:0 2px 6px rgba(14,165,233,0.4);">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive"
                                style="border-radius:8px;
                                        overflow-x:auto; 
                                        -webkit-overflow-scrolling: touch; 
                                        margin-top:20px;">
                                <table class="table table-striped table-bordered"
                                    style="margin:0;
                                            background:#ffffff;
                                            color:#1e293b;
                                            min-width:1000px;">
                                    <thead style="background:#0284c7;color:#fff;position:sticky;top:0;z-index:5;">
                                        <tr>
                                            <th>No</th>
                                            <th>Lot No.</th>
                                            <th>Type/Size</th>
                                            <th>Length</th>
                                            <th>Weight</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Mesin No</th>
                                            <th>Pitch</th>
                                            <th>Visual</th>
                                            <th>Operator</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($labels as $index => $label)
                                        <tr>
                                            <td>{{ $labels->firstItem() + $index }}</td>
                                            <td>{{ $label->lot_number }}</td>
                                            <td>{{ $label->type_size }}</td>
                                            <td>{{ $label->length }} m</td>
                                            <td>{{ $label->weight }} kg</td>
                                            <td>{{ $label->shift_date }}</td>
                                            <td>{{ $label->shift }}</td>
                                            <td>{{ $label->machine_number }}</td>
                                            <td>{{ $label->pitch }} mm</td>
                                            <td>{{ $label->visual }}</td>
                                            <td>{{ $label->operator->name }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="{{ route('web.label.print.single', $label->id) }}"
                                                    target="_blank"
                                                    class="btn btn-xs btn-info"
                                                    style="background:#0ea5e9;border:none;border-radius:4px;color:#fff;">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <a href="{{ route('web.label.edit', $label->id) }}"
                                                    class="btn btn-xs btn-warning"
                                                    style="background:#f59e0b;border:none;border-radius:4px;color:#fff;">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button title="Hapus"
                                                    data-action="delete"
                                                    data-href="{{ route('web.label.delete', $label->id) }}"
                                                    class="btn btn-danger btn-xs"
                                                    style="background:#dc2626;border:none;border-radius:4px;color:#fff;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="11" class="text-center" style="color:#475569;">Tidak ada label</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $labels->links() }}
                        </div>
                    </div>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('button[data-action=delete]').click(function() {
        var url = $(this).data('href');
        Swal.fire({
            title: 'Anda yakin akan menghapus label ?',
            text: "Hal ini tidak dapat di urungkan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value)
                window.location.assign(url);
        });
    });
</script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('bundle/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bundle/bootstrap-datetimepicker/js/bdt.js')}}"></script>
<script>
    function parseMonth(m) {
        if (m < 10) {
            return "0" + m;
        }

        return m;
    }
    $('[data-type=date]').datepicker({
        timePicker: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 1500
    });

    $('[data-type=datetime]').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    function resetForm() {
        $("input#length").val(null);
        $("input#weight").val(null);
        $("select#date").val(null);
        $("select#shift").val(null);
        $("select#machine_no").val(null);
        $("input[name=pitch]").prop('checked', false);
        $("input#remark").val(null);
        $("input#bobin_no").val(null);
        $("input#lot_not").val(null);
    }

    function initForm() {
        $("form#form_print").on('submit', function(e) {
            e.preventDefault();
            var fail = false;

            // Length
            if ($("input#length").val() == "" || $("input#length").val() == null) {
                $("#label_length").addClass("has-error");
                fail = true;
            } else {
                $("#label_length").removeClass("has-error");
            }

            // Weight
            if ($("input#weight").val() == "" || $("input#weight").val() == null) {
                $("#label_weight").addClass("has-error");
                fail = true;
            } else {
                $("#label_weight").removeClass("has-error");
            }

            // Date
            if ($("select#date").val() == "" || $("select#date").val() == null) {
                $("#label_date").addClass("has-error");
                fail = true;
            } else {
                $("#label_date").removeClass("has-error");
            }

            // Lot No
            if ($("input#lot_not").val() == "" || $("input#lot_not").val() == null) {
                $("#label_lot_not").addClass("has-error");
                fail = true;
            } else {
                $("#label_lot_not").removeClass("has-error");
            }

            // Shift
            if ($("select#shift").val() == "" || $("select#shift").val() == null) {
                $("#label_shift").addClass("has-error");
                fail = true;
            } else {
                $("#label_shift").removeClass("has-error");
            }

            // Machine No
            if ($("select#machine_no").val() == "" || $("select#machine_no").val() == null) {
                $("#label_machine_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_machine_no").removeClass("has-error");
            }

            // Remark
            if ($("input#remark").val() == "" || $("input#remark").val() == null) {
                $("#label_remark").addClass("has-error");
                fail = true;
            } else {
                $("#label_remark").removeClass("has-error");
            }

            // Bobin No
            if ($("input#bobin_no").val() == "" || $("input#bobin_no").val() == null) {
                $("#label_bobin_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_bobin_no").removeClass("has-error");
            }

            if (!fail) {
                $(this).unbind("submit");
                $(this).submit();
                resetForm();
                initForm();
            }
        });
    }



    var now = new Date();
    var now_month = now.getMonth();

    $('select#date').append('<option value="' + now.getFullYear() + '-' + parseMonth(now_month + 1) + '-' + now.getDate() + '">' + now.getFullYear() + '-' + parseMonth(now_month + 1) + '-' + now.getDate() + '</option>');

    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    var month = yesterday.getMonth();

    $('select#date').append('<option value="' + yesterday.getFullYear() + '-' + parseMonth(month + 1) + '-' + yesterday.getDate() + '">' + yesterday.getFullYear() + '-' + parseMonth(month + 1) + '-' + yesterday.getDate() + '</option>');

    //$('input#length').on('change', function() {
    //    var weight = $(this).val() * 0.0174;
    //    weight = Math.round(weight)
    //    $('input#weight').val(weight);
    //});
</script>
@endpush