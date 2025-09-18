@extends('web.layout.main')

@section('content')
<div class="row" style="padding:40px 30px;">
    <div class="col-md-12">
        <div class="box" style="background:#fff;border-radius:10px;box-shadow:0 3px 10px rgba(0,0,0,.1);padding:25px;">
            <h3 style="color:#0284c7;font-weight:bold;margin-bottom:20px;margin-top:-10px;">
                <span class="glyphicon glyphicon-book" style="margin-right:8px;"></span> Panduan Penggunaan Sistem
            </h3>
            <p style="margin-bottom:25px;">Klik setiap topik di bawah untuk melihat panduan detail:</p>

            <div class="panel-group" id="accordion">

                {{-- AUTH --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseAuth">
                                <span class="glyphicon glyphicon-log-in" style="margin-right:8px;"></span> 1. Login & Logout
                            </a>
                        </h4>
                    </div>
                    <div id="collapseAuth" class="panel-collapse collapse">
                        <div class="panel-body">
                            - <b>Login</b>: akses <code>/admin/login</code>, masukkan username & password.<br>
                            - <b>Logout</b>: klik menu <b>Sign Out</b> (role <code>admin</code> atau <code>operator</code>).<br>
                            - Jika login gagal, periksa kembali kredensial Anda.
                        </div>
                    </div>
                </div>

                {{-- DASHBOARD --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDashboard">
                                <span class="glyphicon glyphicon-dashboard" style="margin-right:8px;"></span> 2. Dashboard / Input Label
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDashboard" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Menu <b>Input Label</b> terbuka otomatis sebagai dashboard.<br>
                            - Gunakan tombol <b>Tambah Label</b> untuk input data baru.<br>
                            - Sistem otomatis membuat <code>lot_number</code> dari mesin & tanggal shift.<br>
                            - Label pertama kali tersimpan langsung tercetak (<b>print_count = 1</b>).
                        </div>
                    </div>
                </div>

                {{-- DATA LABEL --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseDataLabel">
                                <span class="glyphicon glyphicon-list-alt" style="margin-right:8px;"></span> 3. Data Label
                            </a>
                        </h4>
                    </div>
                    <div id="collapseDataLabel" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Menu <b>Data Label</b> menampilkan daftar label.<br>
                            - Gunakan kolom <b>search</b> untuk mencari berdasarkan <code>lot_number</code>.<br>
                            - Data ditampilkan per halaman (10 item).
                        </div>
                    </div>
                </div>

                {{-- EDIT / DELETE --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit">
                                <span class="glyphicon glyphicon-pencil" style="margin-right:8px;"></span> 4. Edit & Hapus Label
                            </a>
                        </h4>
                    </div>
                    <div id="collapseEdit" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Klik tombol <b>Edit</b> untuk memperbarui data label.<br>
                            - Setelah disimpan, label mendapat nomor urut baru bila perlu & <code>print_count</code> bertambah.<br>
                            - Klik <b>Delete</b> untuk menghapus data label permanen.
                        </div>
                    </div>
                </div>

                {{-- PRINT LABEL --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrint">
                                <span class="glyphicon glyphicon-print" style="margin-right:8px;"></span> 5. Print Label
                            </a>
                        </h4>
                    </div>
                    <div id="collapsePrint" class="panel-collapse collapse">
                        <div class="panel-body">
                            - <b>Print Satu Label</b>: klik tombol <b>Print</b> di tabel Data Label.<br>
                            - <b>Print Banyak Label</b>: buka menu <b>Print View</b>, filter berdasarkan tanggal, lalu cetak sekaligus.<br>
                            - Fitur ini tersedia untuk role <code>admin</code> dan <code>operator</code>.
                        </div>
                    </div>
                </div>

                {{-- EXPORT --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseExport">
                                <span class="glyphicon glyphicon-export" style="margin-right:8px;"></span> 6. Export Data (Excel / PDF)
                            </a>
                        </h4>
                    </div>
                    <div id="collapseExport" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Hanya bisa diakses oleh <b>Admin</b>.<br>
                            - Pilih rentang <b>Start Date</b> & <b>End Date</b> sebelum export.<br>
                            - Klik <b>Export Excel</b> untuk file <code>.xlsx</code>.<br>
                            - Klik <b>Export PDF</b> untuk file <code>.pdf</code> (A4 Landscape).
                        </div>
                    </div>
                </div>

                {{-- USER --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseUser">
                                <span class="glyphicon glyphicon-user" style="margin-right:8px;"></span> 7. Manajemen User (Admin)
                            </a>
                        </h4>
                    </div>
                    <div id="collapseUser" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Menu ini hanya tersedia untuk <b>Admin</b>.<br>
                            - Tambah, edit, hapus akun user sesuai kebutuhan.<br>
                            - Tersedia fitur <b>Bulk Import</b> untuk menambahkan banyak user sekaligus via Excel.<br>
                            - Setiap user diberi role <code>admin</code> atau <code>operator</code>.
                        </div>
                    </div>
                </div>

                {{-- GUIDE --}}
                <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                    <div class="panel-heading" style="background:#f8fafc;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseGuide">
                                <span class="glyphicon glyphicon-question-sign" style="margin-right:8px;"></span> 8. Panduan / Help
                            </a>
                        </h4>
                    </div>
                    <div id="collapseGuide" class="panel-collapse collapse">
                        <div class="panel-body">
                            - Halaman ini berisi petunjuk penggunaan seluruh fitur sistem.<br>
                            - Jika ada kendala, hubungi administrator sistem untuk bantuan lebih lanjut.
                        </div>
                    </div>
                </div>

            </div> {{-- end accordion --}}
        </div>
    </div>
</div>
@endsection
