@extends('web.layout.main')
@section('content')
<!-- Info boxes -->
<div class="row" style="padding:40px 30px;">
    <form id="form_print" method="post" action="{{route('web.dashboard.print')}}" target="_blank">
        {{csrf_field()}}
        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-sm-4 col-sm-offset-2">
                <div class="panel panel-default" style="background: rgba(255, 255, 255, 0.15); border-radius: 15px; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 32px rgba(31,38,135,0.37); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="size">Type/Size</label>
                            <select name="size" class="form-control" id="size" required>
                                <option value="">-- Pilih Type/Size --</option>
                                <option value="AV 800 SQ Outer">AV 800 SQ Outer</option>
                                <option value="AV 1000 SQ Outer">AV 1000 SQ Outer</option>
                                <option value="AV 1500 SQ Outer">AV 1500 SQ Outer</option>
                                <option value="EB 500 SQ Outer">EB 500 SQ Outer</option>
                                <option value="EB 900 SQ Outer">EB 900 SQ Outer</option>
                                <option value="EB 1500 SQ Outer">EB 1500 SQ Outer</option>
                                <option value="EB 2000 SQ Outer">EB 2000 SQ Outer</option>
                                <option value="EB 3000 SQ Outer">EB 3000 SQ Outer</option>
                                <option value="EB 4000 SQ Outer">EB 4000 SQ Outer</option>
                                <option value="HDEB 900 SQ Outer">HDEB 900 SQ Outer</option>
                                <option value="HDEB 1500 SQ Outer">HDEB 1500 SQ Outer</option>
                                <option value="HDEB 2000 SQ Outer">HDEB 2000 SQ Outer</option>
                                <option value="HDEB 3000 SQ Outer">HDEB 3000 SQ Outer</option>
                                <option value="HDEB 4000 SQ Outer">HDEB 4000 SQ Outer</option>
                            </select>
                        </div>
                        <div id="label_length" class="form-group">
                            <label for="length">Length (meter)</label>
                            <input type="number" name="length" class="form-control" id="length" placeholder="Length" required>
                        </div>
                        <div id="label_weight" class="form-group">
                            <label for="weight">Weight (Kg)</label>
                            <input type="number" name="weight" class="form-control" id="weight" placeholder="Weight" required>
                        </div>
                        <div id="label_date" class="form-group">
                            <label for="date">Date</label>
                            <select id="date" name="shift_date" class="form-control" required></select>
                        </div>
                        <div id="label_lot_not" class="form-group">
                            <label for="lot_not">Lot No</label>
                            <input type="number" name="lot_not" value="" class="form-control" id="lot_not" placeholder="Lot No (ex: 001)" required>
                        </div>
                        <div id="label_shift" class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="">-- Pilih Shift --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div id="label_machine_no" class="form-group">
                            <label for="machine_no">Machine No</label>
                            <select name="machine_number" id="machine_no" class="form-control" required>
                                <option value="">-- Pilih Machine --</option>
                                <option value="118">118</option>
                                <option value="119">119</option>
                                <option value="120">120</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan -->
            <div class="col-sm-4">
                <div class="panel panel-default" style="background: rgba(255, 255, 255, 0.15); border-radius: 15px; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 32px rgba(31,38,135,0.37); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
                    <div class="panel-body">
                        <div id="label_pitch" class="form-group">
                            <label for="pitch">Pitch</label>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="20.25" type="radio" checked required
                                        style="accent-color:#0284c7 !important;"> 20.25
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="22.50" type="radio"
                                        style="accent-color:#0284c7 !important;"> 22.50
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction</label>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="S" type="radio" checked required
                                        style="accent-color:#0284c7 !important;"> S
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="Z" type="radio"
                                        style="accent-color:#0284c7 !important;"> Z
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visual">Visual</label>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="OK" type="radio" checked required
                                        style="accent-color:green !important;"> OK
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="NG" type="radio"
                                        style="accent-color:red !important;"> NG
                                </label>
                            </div>
                        </div>
                        <div id="label_remark" class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" name="remark" class="form-control" id="remark" placeholder="Remark" required>
                        </div>
                        <div id="label_bobin_no" class="form-group">
                            <label for="bobin_no">No Bobin</label>
                            <input type="text" name="bobin_no" value="" class="form-control" id="bobin_no" placeholder="No Bobin" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit"
                        class="btn btn-primary btn-block"
                        style="background:#0284c7 !important;
                        border:none !important;
                        color:#fff !important;
                        font-weight:600;
                        border-radius:8px;
                        ">
                        Print
                    </button>
                </div>
            </div>
    </form>
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