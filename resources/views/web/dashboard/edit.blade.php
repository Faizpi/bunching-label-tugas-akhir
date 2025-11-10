@extends('web.layout.main')

@section('content')
<!-- Info boxes -->
<div class="countainer-form">
<div class="row" style="padding:40px 45px;">
    <form id="form_print" method="post" action="{{route('web.label.update', $label->id)}}" target="_blank">
        {{csrf_field()}}
        <div class="row">
            <!-- Panel kiri -->
            <div class="col-sm-6">
                <div class="panel panel-default" style="background:#ffffff;
                    border-radius:10px;
                    border:1px solid #e5e7eb;
                    box-shadow:0 4px 12px rgba(0,0,0,0.1);
                    overflow:hidden;">
                    <div class="panel-body">

                        <div id="label_lot_not" class="form-group">
                            <label for="lot_not">Lot No</label>
                            <input type="number" 
                                name="lot_not" 
                                value="{{ substr($label->lot_number, -3) }}" 
                                class="form-control" 
                                id="lot_not" 
                                placeholder="Lot No (ex: 001)" 
                                required>
                        </div>

                        <div class="form-group">
                            <label for="type">Type/Size</label>
                            <select id="type" class="form-control" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="AV" {{ Str::startsWith($label->size, 'AV') ? 'selected':'' }}>AV</option>
                                <option value="EB" {{ Str::startsWith($label->size, 'EB') ? 'selected':'' }}>EB</option>
                                <option value="HDEB" {{ Str::startsWith($label->size, 'HDEB') ? 'selected':'' }}>HDEB</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="size">Type/Size</label>
                            <select id="size" class="form-control" required>
                                <option value="{{ $label->size }}" selected>{{ $label->size }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="extra">Extra / No Extra</label>
                            <select id="extra" name="extra" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Extra" {{ $label->extra_weight || $label->extra_length ? 'selected':'' }}>Extra</option>
                                <option value="No Extra" {{ !$label->extra_weight && !$label->extra_length ? 'selected':'' }}>No Extra</option>
                            </select>
                        </div>

                        <div id="extra_fields" style="{{ $label->extra_weight || $label->extra_length ? '' : 'display:none;' }}">
                            <!-- <div class="form-group">
                                <label for="extra_weight">Extra Weight (Kg)</label>
                                <input type="number" name="extra_weight" id="extra_weight" class="form-control"
                                    value="{{ $label->extra_weight }}">
                            </div> -->
                            <div class="form-group">
                                <label for="extra_length">Extra Length (m)</label>
                                <input type="number" name="extra_length" id="extra_length" class="form-control"
                                    value="{{ $label->extra_length }}">
                            </div>
                        </div>

                        {{-- hidden input gabungan semua --}}
                        <input type="hidden" name="type_size" id="type_size" value="{{ $label->type_size }}">

                        <div id="label_length" class="form-group">
                            <label for="length">Length (m)</label>
                            <input type="text" name="length" class="form-control" id="length"
                                value="{{ $label->length }}" readonly required>
                        </div>

                        @php
                            $drumValue = 1;
                            if (strpos($label->length, 'x') !== false) {
                                $parts = explode('x', $label->length);
                                $drumValue = (int) trim($parts[0]); // ambil angka depan sebelum "x"
                            }
                        @endphp

                        <div id="label_drum" class="form-group">
                            <label for="drum">Jumlah Drum</label>
                            <select id="drum" name="drum" class="form-control" required>
                                @for($i=1;$i<=4;$i++)
                                    <option value="{{$i}}" {{ $drumValue == $i ? "selected":"" }}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel kanan -->
            <div class="col-sm-6">
                <div class="panel panel-default" style="background:#ffffff;
                    border-radius:10px;
                    border:1px solid #e5e7eb;
                    box-shadow:0 4px 12px rgba(0,0,0,0.1);
                    overflow:hidden;">
                    <div class="panel-body">

                        <div id="label_weight" class="form-group">
                            <label for="weight">Weight (Kg)</label>
                            <input type="number" name="weight" class="form-control" id="weight"
                                value="{{ $label->weight }}" required>
                        </div>

                        <div id="label_date" class="form-group">
                            <label for="date">Date</label>
                            <select id="date" name="shift_date" class="form-control" required>
                                <option value="{{ $label->shift_date }}" selected>{{ $label->shift_date }}</option>
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
                       
                        <div id="label_shift" class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="1" {{ $label->shift == 1 ? "selected":"" }}>1</option>
                                <option value="2" {{ $label->shift == 2 ? "selected":"" }}>2</option>
                                <option value="3" {{ $label->shift == 3 ? "selected":"" }}>3</option>
                            </select>
                        </div>

                        <!-- <div id="label_pitch" class="form-group">
                            <label for="pitch">Pitch (mm)</label>
                            <input type="number" step="0.01" name="pitch" id="pitch"
                                value="{{ $label->pitch }}" class="form-control">
                        </div> -->

                        <div class="form-group">
                            <label for="visual">Visual</label><br>
                            <label style="display: block;">
                                <input name="visual" value="OK" type="radio"
                                    {{ $label->visual == "OK" ? "checked":"" }} required
                                    style="accent-color:green !important;"> OK
                            </label>
                            <label style="display: block;">
                                <input name="visual" value="NG" type="radio"
                                    {{ $label->visual == "NG" ? "checked":"" }}
                                    style="accent-color:red !important;"> NG
                            </label>
                        </div>

                        <!-- <div id="label_bobin_no" class="form-group">
                            <label for="bobin_no">QC Test</label>
                            <input type="text" name="bobin_no" value="{{ $label->bobin_no }}"
                                class="form-control" id="bobin_no" placeholder="QC Test">
                        </div> -->

                        <div id="label_remark" class="form-group">
                            <label for="remark">Remark</label>
                            <input type="text" name="remark" class="form-control" id="remark"
                                value="{{ $label->remark }}" placeholder="Remark">
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <button id="save_and_print" type="button" class="btn btn-success btn-block"
                                style="background:rgba(240, 183, 13, 1) !important;
                                border:none !important;
                                color:#fff !important;
                                font-weight:600;
                                border-radius:8px;
                                margin-bottom:10px;
                                ">
                                Save & Print
                            </button>
                        </div>
                        <div class="col-sm-12 col-md-8">
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
</div>
@endsection

@push('styles')
<style>
/* Tablet & Mobile Stack Layout */
@media (max-width: 1024px) {
  /* Semua col numpuk full width */
  .row [class*="col-"] {
    float: none !important;
    width: 100% !important;
    max-width: 100% !important;
    margin-left: 0 !important;
  }
  
  .panel {
    width: 100% !important;
    margin: 0 0 20px 0 !important;
  }

  .row {
    margin-left: 0 !important;
    margin-right: 0 !important;
  }

  .panel-body {
    padding: 15px !important;
  }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    // === Ambil data lama dari DB ===
    let oldSize = @json($label->type_size) || "";   // fallback biar ga null
    let cleanOldSize = "";
    let oldType = "";

    if (oldSize) {
        cleanOldSize = oldSize.split("\n")[0].split(" - ")[0].trim();
        oldType = cleanOldSize.split(" ")[0];
    }

    console.log("DEBUG => oldSize:", oldSize);
    console.log("DEBUG => cleanOldSize:", cleanOldSize);
    console.log("DEBUG => oldType:", oldType);

    const sizeOptions = {
        "AV": ["800 SQ Outer", "1000 SQ Outer", "1500 SQ Outer"],
        "EB": [
            "500 SQ Outer", "900 SQ Outer", "1500 SQ Outer", "2000 SQ Outer", "3000 SQ Outer", "4000 SQ Outer",
            "1500 SQ Inner", "2000 SQ Inner", "3000 SQ Inner", "4000 SQ Inner"
        ],
        "HDEB": [
            "900 SQ Outer", "1500 SQ Outer", "2000 SQ Outer", "3000 SQ Outer", "4000 SQ Outer",
            "1500 SQ Inner", "2000 SQ Inner", "3000 SQ Inner", "4000 SQ Inner"
        ]
    };

    const stdLength = {
        // ==== OUTER ====
        "AV 800 SQ Outer": 2000,
        "AV 1000 SQ Outer": 1800,
        "AV 1500 SQ Outer": 1400,

        "EB 500 SQ Outer": 3000,
        "EB 900 SQ Outer": 2000,
        "EB 1500 SQ Outer": 1800,
        "EB 2000 SQ Outer": 1400,
        "EB 3000 SQ Outer": 900,
        "EB 4000 SQ Outer": 700,

        "HDEB 900 SQ Outer": 2000,
        "HDEB 1500 SQ Outer": 1400,
        "HDEB 2000 SQ Outer": 1000,
        "HDEB 3000 SQ Outer": 700,
        "HDEB 4000 SQ Outer": 500,

        // ==== INNER ====
        "EB 1500 SQ Inner": 1800,
        "EB 2000 SQ Inner": 1400,
        "EB 3000 SQ Inner": 900,
        "EB 4000 SQ Inner": 700,

        "HDEB 1500 SQ Inner": 1400,
        "HDEB 2000 SQ Inner": 1000,
        "HDEB 3000 SQ Inner": 700,
        "HDEB 4000 SQ Inner": 500,
    };

const cableSize = {
        // ==== OUTER ====
        "AV 800 SQ Outer": "(50 x 0.45 mm)",
        "AV 1000 SQ Outer": "7 x (9 x 0.45 mm)",
        "AV 1500 SQ Outer": "7 x (12 x 0.45 mm)",

        "EB 500 SQ Outer": "7 x (9 x 0.32 mm)",
        "EB 900 SQ Outer": "7 x (16 x 0.32 mm)",
        "EB 1500 SQ Outer": "19 x (9 x 0.32 mm)",
        "EB 2000 SQ Outer": "19 x (13 x 0.32 mm)",
        "EB 3000 SQ Outer": "19 x (19 x 0.32 mm)",
        "EB 4000 SQ Outer": "19 x (26 x 0.32 mm)",

        "HDEB 900 SQ Outer": "7 x (16 x 0.32 mm)",
        "HDEB 1500 SQ Outer": "19 x (9 x 0.32 mm)",
        "HDEB 2000 SQ Outer": "19 x (13 x 0.32 mm)",
        "HDEB 3000 SQ Outer": "19 x (19 x 0.32 mm)",
        "HDEB 4000 SQ Outer": "19 x (26 x 0.32 mm)",

        // ==== INNER ====
        "EB 1500 SQ Inner": "7 x (9 x 0.32 mm)",
        "EB 2000 SQ Inner": "7 x (13 x 0.32 mm)",
        "EB 3000 SQ Inner": "7 x (19 x 0.32 mm)",
        "EB 4000 SQ Inner": "7 x (26 x 0.32 mm)",

        "HDEB 1500 SQ Inner": "7 x (9 x 0.32 mm)",
        "HDEB 2000 SQ Inner": "7 x (13 x 0.32 mm)",
        "HDEB 3000 SQ Inner": "7 x (19 x 0.32 mm)",
        "HDEB 4000 SQ Inner": "7 x (26 x 0.32 mm)",
    };

    function updateTypeSize() {
        const size = document.getElementById("size").value;
        const extra = document.getElementById("extra").value;
        const typeSizeInput = document.getElementById("type_size");

        if (size) {
            let text = size;
            if (cableSize[size]) {
                text += "\n" + cableSize[size];
            }
            if (extra) {
                text += " - " + extra;
            }
            typeSizeInput.value = text;
        } else {
            typeSizeInput.value = "";
        }
    }

    function updateLength() {
        const selected = document.getElementById("size").value;
        const drum = parseInt(document.getElementById("drum").value) || 1;
        const lengthInput = document.getElementById("length");

        if (stdLength[selected]) {
            lengthInput.value = drum + " x " + stdLength[selected];
        } else {
            lengthInput.value = "";
        }
    }

    // === Auto-set dropdown dari DB ===
    const typeSelect = document.getElementById("type");
    const sizeSelect = document.getElementById("size");

    if (oldType && sizeOptions[oldType]) {
        typeSelect.value = oldType; // set type lama
        sizeSelect.innerHTML = '<option value="">-- Pilih Size --</option>';

        sizeOptions[oldType].forEach(function(size) {
            let fullValue = oldType + " " + size;
            let opt = document.createElement("option");
            opt.value = fullValue;
            opt.textContent = fullValue;

            if (fullValue === cleanOldSize) {
                opt.selected = true; // set sesuai DB
            }
            sizeSelect.appendChild(opt);
        });
    }

    // === Event listeners ===
    typeSelect.addEventListener("change", function() {
        const type = this.value;
        sizeSelect.innerHTML = '<option value="">-- Pilih Size --</option>';

        if (sizeOptions[type]) {
            sizeOptions[type].forEach(function(size) {
                let fullValue = type + " " + size;
                let opt = document.createElement("option");
                opt.value = fullValue;
                opt.textContent = fullValue;
                sizeSelect.appendChild(opt);
            });
        }

        document.getElementById("length").value = "";
        updateTypeSize();
    });

    const extraSelect = document.getElementById("extra");
    const extraFields = document.getElementById("extra_fields");

    extraSelect.addEventListener("change", function() {
        if (this.value === "Extra") {
            extraFields.style.display = "block";
        } else {
            extraFields.style.display = "none";
            document.getElementById("extra_weight").value = "";
            document.getElementById("extra_length").value = "";
        }
    });

    sizeSelect.addEventListener("change", function() {
        updateLength();
        updateTypeSize();
    });

    document.getElementById("extra").addEventListener("change", updateTypeSize);
    document.getElementById("drum").addEventListener("change", updateLength);

    // === Sinkronisasi awal ===
    updateTypeSize();
    updateLength();
});
</script>
@endpush


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

            // if ($("input[name=pitch]").val() == "" || $("input[name=pitch]").val() == null) {
            //     $("#label_pitch").addClass("has-error");
            //     fail = true;
            // } else {
            //     $("#label_pitch").removeClass("has-error");
            // }

            // if ($("input#remark").val() == "" || $("input#remark").val() == null) {
            //     $("#label_remark").addClass("has-error");
            //     fail = true;
            // } else {
            //     $("#label_remark").removeClass("has-error");
            // }

            // if ($("input#bobin_no").val() == "" || $("input#bobin_no").val() == null) {
            //     $("#label_bobin_no").addClass("has-error");
            //     fail = true;
            // } else {
            //     $("#label_bobin_no").removeClass("has-error");
            // }

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