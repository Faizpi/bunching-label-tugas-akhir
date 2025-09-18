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
                            ⬛ <b>Login</b><br>
                            1. Buka halaman <code>/admin/login</code>.<br>
                            2. Masukkan <b>username</b> dan <b>password</b> dengan benar.<br>
                            3. Klik tombol <b>Login</b> untuk masuk.<br><br>
                            ⬛ <b>Logout</b><br>
                            - Klik menu <b>Sign Out</b> di pojok kanan atas.<br>
                            - Setelah logout, Anda akan kembali ke halaman login.<br><br>
                            ⚠️ Jika login gagal, periksa kembali username dan password Anda.
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
                            - Setelah login, sistem otomatis membuka menu <b>Input Label</b> sebagai dashboard.<br>
                            - Klik tombol <b>Tambah Label</b> untuk membuat label baru.<br>
                            - Sistem akan membuat <code>lot_number</code> secara otomatis berdasarkan mesin dan tanggal shift.<br>
                            - Label pertama kali disimpan akan langsung tercetak, dengan <code>print_count = 1</code>.
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
                            - Menu <b>Data Label</b> menampilkan semua label yang sudah dibuat.<br>
                            - Gunakan kolom <b>Search</b> untuk mencari label berdasarkan <code>lot_number</code>.<br>
                            - Data label ditampilkan per halaman (10 item).
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
                            - Klik tombol <b>Edit</b> pada label yang ingin diperbarui.<br>
                            - Perbarui data lalu simpan agar perubahan tersimpan di sistem.<br>
                            - Jika label dicetak ulang, <code>print_count</code> akan bertambah.<br>
                            - Klik tombol <b>Delete</b> untuk menghapus label secara permanen.
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
                            - <b>Cetak satu label</b>: klik tombol <b>Print</b> pada tabel Data Label.<br>
                            - <b>Cetak banyak label</b>: buka menu <b>Print View</b>, pilih tanggal yang diinginkan, lalu cetak sekaligus.<br>
                            - Fitur print bisa digunakan oleh <code>admin</code> maupun <code>operator</code>.
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
                            - Menu export hanya tersedia untuk <b>Admin</b>.<br>
                            - Pilih <b>Start Date</b> dan <b>End Date</b> sebelum melakukan export.<br>
                            - Klik <b>Export Excel</b> untuk mengunduh file <code>.xlsx</code>.<br>
                            - Klik <b>Export PDF</b> untuk mengunduh file <code>.pdf</code> (format A4 landscape).
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
                            - Menu ini hanya bisa diakses oleh <b>Admin</b>.<br>
                            - Admin dapat menambah, mengedit, atau menghapus akun user.<br>
                            - Tersedia fitur <b>Bulk Import</b> untuk menambahkan banyak user sekaligus melalui file Excel.<br>
                            - Setiap user harus diberi role <code>admin</code> atau <code>operator</code>.
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
                            - Jika mengalami kendala teknis, silakan hubungi administrator untuk bantuan lebih lanjut.
                        </div>
                    </div>
                </div>

            </div> {{-- end accordion --}}
        </div>
    </div>
</div>
@endsection
