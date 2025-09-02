@extends('web.layout.main')

@section('content')
<!-- Info boxes -->
<div class="row" style="margin-top: 3rem">
    <form id="form_print" method="post" action="{{route('web.label.update', $label->id)}}" target="_blank">
        {{csrf_field()}}
        <div class="row">
            <!-- Panel kiri -->
            <div class="col-sm-4 col-sm-offset-2">
                <div class="panel panel-default" style="background: rgba(255, 255, 255, 0.15); border-radius: 15px; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 32px rgba(31,38,135,0.37); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="size">Type/Size</label>
                            <select name="size" class="form-control" id="size" required>
                                <option value="">-- Pilih Type/Size --</option>
                                <option value="AV 800 SQ Outer" {{ $label->size == "AV 800 SQ Outer" ? "selected":"" }}>AV 800 SQ Outer</option>
                                <option value="AV 1000 SQ Outer" {{ $label->size == "AV 1000 SQ Outer" ? "selected":"" }}>AV 1000 SQ Outer</option>
                                <option value="AV 1500 SQ Outer" {{ $label->size == "AV 1500 SQ Outer" ? "selected":"" }}>AV 1500 SQ Outer</option>
                                <option value="EB 500 SQ Outer" {{ $label->size == "EB 500 SQ Outer" ? "selected":"" }}>EB 500 SQ Outer</option>
                                <option value="EB 900 SQ Outer" {{ $label->size == "EB 900 SQ Outer" ? "selected":"" }}>EB 900 SQ Outer</option>
                                <option value="EB 1500 SQ Outer" {{ $label->size == "EB 1500 SQ Outer" ? "selected":"" }}>EB 1500 SQ Outer</option>
                                <option value="EB 2000 SQ Outer" {{ $label->size == "EB 2000 SQ Outer" ? "selected":"" }}>EB 2000 SQ Outer</option>
                                <option value="EB 3000 SQ Outer" {{ $label->size == "EB 3000 SQ Outer" ? "selected":"" }}>EB 3000 SQ Outer</option>
                                <option value="EB 4000 SQ Outer" {{ $label->size == "EB 4000 SQ Outer" ? "selected":"" }}>EB 4000 SQ Outer</option>
                                <option value="HDEB 900 SQ Outer" {{ $label->size == "HDEB 900 SQ Outer" ? "selected":"" }}>HDEB 900 SQ Outer</option>
                                <option value="HDEB 1500 SQ Outer" {{ $label->size == "HDEB 1500 SQ Outer" ? "selected":"" }}>HDEB 1500 SQ Outer</option>
                                <option value="HDEB 2000 SQ Outer" {{ $label->size == "HDEB 2000 SQ Outer" ? "selected":"" }}>HDEB 2000 SQ Outer</option>
                                <option value="HDEB 3000 SQ Outer" {{ $label->size == "HDEB 3000 SQ Outer" ? "selected":"" }}>HDEB 3000 SQ Outer</option>
                                <option value="HDEB 4000 SQ Outer" {{ $label->size == "HDEB 4000 SQ Outer" ? "selected":"" }}>HDEB 4000 SQ Outer</option>
                            </select>
                        </div>
                        <div id="label_length" class="form-group">
                            <label for="length">Length (meter)</label>
                            <input type="number" name="length" class="form-control" id="length" value="{{ $label->length }}" placeholder="Length" required>
                        </div>
                        <div id="label_weight" class="form-group">
                            <label for="weight">Weight (Kg)</label>
                            <input type="number" name="weight" class="form-control" id="weight" value="{{ $label->weight }}" placeholder="Weight" required>
                        </div>
                        <div id="label_date" class="form-group">
                            <label for="date">Date</label>
                            <select id="date" name="shift_date" class="form-control" required>
                                <option value="{{ $label->shift_date }}">{{ $label->shift_date }}</option>
                            </select>
                        </div>
                        <div id="label_lot_not" class="form-group">
                            <label for="lot_not">Lot No</label>
                            <input type="number" name="lot_not" value="{{ $label->lot_not }}" class="form-control" id="lot_not" placeholder="Lot No (ex: 001)" required>
                        </div>
                        <div id="label_shift" class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="1" {{ $label->shift == 1 ? "selected":"" }}>1</option>
                                <option value="2" {{ $label->shift == 2 ? "selected":"" }}>2</option>
                                <option value="3" {{ $label->shift == 3 ? "selected":"" }}>3</option>
                            </select>
                        </div>
                        <div id="label_machine_no" class="form-group">
                            <label for="machine_no">Machine No</label>
                            <select name="machine_number" id="machine_no" class="form-control" required>
                                <option value="118" {{ $label->machine_number == 118 ? "selected":"" }}>118</option>
                                <option value="119" {{ $label->machine_number == 119 ? "selected":"" }}>119</option>
                                <option value="120" {{ $label->machine_number == 120 ? "selected":"" }}>120</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel kanan -->
            <div class="col-sm-4">
                <div class="panel panel-default" style="background: rgba(255, 255, 255, 0.15); border-radius: 15px; border: 1px solid rgba(255,255,255,0.3); box-shadow: 0 8px 32px rgba(31,38,135,0.37); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
                    <div class="panel-body">
                        <div id="label_pitch" class="form-group">
                            <label for="pitch">Pitch</label>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="20.25" type="radio"
                                        {{ $label->pitch == 20.25 ? "checked":"" }} required
                                        style="accent-color:#0284c7 !important;">
                                    20.25
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="pitch" value="22.50" type="radio"
                                        {{ $label->pitch == 22.50 ? "checked":"" }}
                                        style="accent-color:#0284c7 !important;">
                                    22.50
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction</label>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="S" type="radio"
                                        {{ $label->direction == "S" ? "checked":"" }} required
                                        style="accent-color:#0284c7 !important;">
                                    S
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="direction" value="Z" type="radio"
                                        {{ $label->direction == "Z" ? "checked":"" }}
                                        style="accent-color:#0284c7 !important;">
                                    Z
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visual">Visual</label>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="OK" type="radio"
                                        {{ $label->visual == "OK" ? "checked":"" }} required
                                        style="accent-color:#0284c7 !important;">
                                    OK
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="visual" value="NG" type="radio"
                                        {{ $label->visual == "NG" ? "checked":"" }}
                                        style="accent-color:#0284c7 !important;">
                                    NG
                                </label>
                            </div>
                        </div>
                        <div id="label_remark" class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" name="remark" value="{{ $label->remark }}"
                                class="form-control" id="remark" placeholder="Remark" required>
                        </div>
                        <div id="label_bobin_no" class="form-group">
                            <label for="bobin_no">No Bobin</label>
                            <input type="text" name="bobin_no" value="{{ $label->bobin_no }}"
                                class="form-control" id="bobin_no" placeholder="No Bobin" required>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button id="save_and_print" type="button" class="btn btn-success btn-block"
                                style="background:rgba(240, 183, 13, 1) !important;
                                border:none !important;
                                color:#fff !important;
                                font-weight:600;
                                border-radius:8px;
                                ">
                                Save & Print
                            </button>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <button id="just_save" type="button" class="btn btn-warning btn-block"
                                style="background:#02c36e !important;
                                border:none !important;
                                color:#fff !important;
                                font-weight:600;
                                border-radius:8px;
                                ">
                                Save
                            </button>
                        </div>
                    </div>
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
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('bundle/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bundle/bootstrap-datetimepicker/js/bdt.js')}}"></script>
<script>
    var url_save_and_print = "{{route('web.label.update', $label->id)}}";
    var url_just_save = "{{route('web.label.update_only', $label->id)}}";
    var only_save = true;

    $("button#save_and_print").on("click", function() {
        only_save = false;
        $('form#form_print').attr('action', url_save_and_print);
        $("form#form_print").submit();
    });

    $("button#just_save").on("click", function() {
        only_save = true;
        $('form#form_print').attr('target', "_self");
        $('form#form_print').attr('action', url_just_save);
        $("form#form_print").submit();
    });

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
        $("input#weight").val(null);
        $("input#length").val(null);
        $("select#date").val(null);
        $("select#shift").val(null);
        $("select#machine_no").val(null);
        $("input[name=pitch]").val(null);
        $("input#remark").val(null);
        $("input#bobin_no").val(null);
    }

    function initForm() {
        $("form#form_print").on('submit', function(e) {
            e.preventDefault();
            var fail = false;
            if ($("input#length").val() == "" || $("input#length").val() == null) {
                $("#label_length").addClass("has-error");
                fail = true;
            } else {
                $("#label_length").removeClass("has-error");
            }

            if ($("select#date").val() == "" || $("select#date").val() == null) {
                $("#label_date").addClass("has-error");
                fail = true;
            } else {
                $("#label_date").removeClass("has-error");
            }

            if ($("select#shift").val() == "" || $("select#shift").val() == null) {
                $("#label_shift").addClass("has-error");
                fail = true;
            } else {
                $("#label_shift").removeClass("has-error");
            }

            if ($("select#machine_no").val() == "" || $("select#machine_no").val() == null) {
                $("#label_machine_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_machine_no").removeClass("has-error");
            }

            if ($("input[name=pitch]").val() == "" || $("input[name=pitch]").val() == null) {
                $("#label_pitch").addClass("has-error");
                fail = true;
            } else {
                $("#label_pitch").removeClass("has-error");
            }

            if ($("input#remark").val() == "" || $("input#remark").val() == null) {
                $("#label_remark").addClass("has-error");
                fail = true;
            } else {
                $("#label_remark").removeClass("has-error");
            }

            if ($("input#bobin_no").val() == "" || $("input#bobin_no").val() == null) {
                $("#label_bobin_no").addClass("has-error");
                fail = true;
            } else {
                $("#label_bobin_no").removeClass("has-error");
            }

            if (!fail) {
                $(this).unbind("submit");
                $(this).submit();

                if (!only_save) {
                    setTimeout(function() {
                        window.location.assign("{{route('web.dashboard.index')}}");
                    }, 1000);
                }
            }
        });
    }

    initForm();

    var selected = "{{$label->shift_date}}";
    var now = new Date();
    var now_month = now.getMonth();
    var now_value = now.getFullYear() + '-' + parseMonth(now_month + 1) + '-' + now.getDate();

    $('select#date').append('<option value="' + now_value + '" ' + (now_value == selected ? "selected" : "") + '>' + now_value + '</option>');

    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    var month = yesterday.getMonth();
    var yesterday_value = yesterday.getFullYear() + '-' + parseMonth(month + 1) + '-' + yesterday.getDate();

    $('select#date').append('<option value="' + yesterday_value + '" ' + (yesterday_value == selected ? "selected" : "") + '>' + yesterday_value + '</option>');

    $('input#length').on('change', function() {
        var weight = $(this).val() * 0.0174;
        weight = Math.round(weight)
        $('input#weight').val(weight);
    });
</script>
@endpush