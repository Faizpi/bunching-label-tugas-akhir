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
                                    <span class="glyphicon glyphicon-log-in" style="margin-right:8px;"></span> 1. Login &
                                    Logout
                                </a>
                            </h4>
                        </div>
                        <div id="collapseAuth" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Login</b><br>
                                1. Buka halaman Website.<br>
                                2. Masukkan <b>nsk</b> dan <b>password</b> dengan benar.<br>
                                3. Klik tombol <b>Login</b> untuk masuk.<br><br>
                                <b>Logout</b><br>
                                - Klik menu <b>Sign Out</b> di pojok kanan atas.<br>
                                - Setelah logout, Anda akan kembali ke halaman login.<br><br>
                                *Jika login gagal, periksa kembali username dan password Anda atau Hubungi Admin.
                            </div>
                        </div>
                    </div>

                    {{-- DASHBOARD --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseDashboard">
                                    <span class="glyphicon glyphicon-dashboard" style="margin-right:8px;"></span> 2.
                                    Dashboard / Input Label
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDashboard" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Setelah login, sistem otomatis membuka menu <b>Input Label</b> sebagai dashboard.<br>
                                - Isi data di form yang tersedia lalu klik tombol <b>Print</b> untuk membuat label baru.<br>
                                - Sistem akan membuat <code>lot_number</code> secara otomatis berdasarkan mesin dan tanggal
                                shift.<br>
                                - Label pertama kali disimpan akan langsung tercetak, dengan <code>print_count = 1</code>.
                            </div>
                        </div>
                    </div>

                    {{-- DATA LABEL --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseDataLabel">
                                    <span class="glyphicon glyphicon-list-alt" style="margin-right:8px;"></span> 3. Data
                                    Label
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDataLabel" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Menu <b>Data Label</b> menampilkan semua label yang sudah dibuat.<br>
                                - Gunakan kolom <b>Search</b> untuk mencari label berdasarkan <code>lot_number</code>.<br>
                                - Data label ditampilkan per halaman (10 item).
                                - Semua user dapat mengakses kolom Action untuk mengedit, menghapus, atau mencetak ulang
                                label.
                            </div>
                        </div>
                    </div>

                    {{-- EDIT / DELETE --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit">
                                    <span class="glyphicon glyphicon-pencil" style="margin-right:8px;"></span> 4. Edit &
                                    Hapus Label
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
                                    <span class="glyphicon glyphicon-print" style="margin-right:8px;"></span> 5. Print Ulang
                                    Label
                                </a>
                            </h4>
                        </div>
                        <div id="collapsePrint" class="panel-collapse collapse">
                            <div class="panel-body">
                                - <b>Cetak satu label</b>: klik tombol <b>Print</b> pada kolom Action di Data Label.<br>
                            </div>
                        </div>
                    </div>

                    {{-- EXPORT --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseExport">
                                    <span class="glyphicon glyphicon-export" style="margin-right:8px;"></span> 6. Export
                                    Data (Excel / Print View / PDF)
                                </a>
                            </h4>
                        </div>
                        <div id="collapseExport" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Menu export hanya tersedia untuk <b>Admin</b>.<br>
                                - Pilih <b>Start Date</b> dan <b>End Date</b> sebelum melakukan export.<br>
                                - Klik <b>Export Excel</b> untuk mengunduh file <code>.xlsx</code>.<br>
                                - Klik <b>Export Print View</b> untuk mengunduh file <code>.pdf atau langsung print</code>
                                (format A4 landscape).
                            </div>
                        </div>
                    </div>

                    {{-- USER --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseUser">
                                    <span class="glyphicon glyphicon-user" style="margin-right:8px;"></span> 7. Manajemen
                                    User (Admin)
                                </a>
                            </h4>
                        </div>
                        <div id="collapseUser" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Menu ini hanya bisa diakses oleh <b>Admin</b>.<br>
                                - Admin dapat menambah, mengedit, atau menghapus akun user.<br>
                                - Setiap user harus diberi role <code>admin</code> atau <code>operator</code>.
                            </div>
                        </div>
                    </div>

                    {{-- AUTO INCREMENT --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseIncrement">
                                    <span class="glyphicon glyphicon-sort" style="margin-right:8px;"></span> 8.
                                    Logika Auto Increment
                                </a>
                            </h4>
                        </div>
                        <div id="collapseIncrement" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Cara sistem membuat nomor lot (<code>lot_number</code>):</b><br><br>

                                Format umum: <code>[mesin][tanggal yymmdd][nomor urut 3 digit]</code><br>
                                Contoh: <code>118250918001</code><br>
                                → Mesin = <b>118</b>, Tanggal = <b>25-09-18</b>, Urutan = <b>001</b><br><br>

                                1. Saat input label baru:
                                <ul>
                                    <li>Sistem mencari semua label dengan <b>mesin</b> dan <b>tanggal</b> yang sama</li>
                                    <li>Ambil <b>lot_number terbesar</b> yang sudah ada</li>
                                    <li>Nomor berikutnya = nomor terakhir + 1</li>
                                </ul>

                                2. Kondisi yang mungkin terjadi:
                                <ul>
                                    <li><b>Tidak ada label sebelumnya</b> → sistem mulai dari <code>001</code></li>
                                    <li><b>Ada label terakhir 118250918005</b> → label baru = <code>118250918006</code></li>
                                    <li><b>Label tengah dihapus</b> (misal 118250918004 dihapus) → sistem tetap lanjut dari
                                        005 → next = <code>006</code> (tidak mengisi nomor kosong)</li>
                                    <li><b>Edit label</b> → jika ganti mesin/tanggal, sistem akan menghitung ulang nomor
                                        urut berdasarkan kombinasi baru (tetap ambil nomor terbesar +1)</li>
                                </ul><br>

                                3. <b>Catatan:</b>
                                <ul>
                                    <li>Nomor lot <b>selalu unik</b> untuk kombinasi mesin + tanggal</li>
                                    <li>Sistem <b>tidak pernah mengulang</b> nomor lama, hanya terus menambah dari yang
                                        terbesar</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- HISTORY FEATURE --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistory">
                                    <span class="glyphicon glyphicon-time" style="margin-right:8px;"></span> 9. Fitur Lot History
                                </a>
                            </h4>
                        </div>
                        <div id="collapseHistory" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Apa itu Lot History?</b><br><br>
                                - Pada halaman login, bagian kanan terdapat daftar <b>Lot History</b>.<br>
                                - Fitur ini menampilkan 3 (tiga) nomor lot terbaru yang sudah dicetak/disimpan.<br><br>

                                <b>Informasi yang ditampilkan:</b>
                                <ul>
                                    <li><b>Nomor Lot</b> – identitas unik dari label (misal <code>118250918001</code>)</li>
                                    <li><b>Operator</b> – nama user yang membuat label tersebut</li>
                                    <li><b>Waktu</b> – tanggal & jam kapan label dibuat</li>
                                </ul><br>

                                <b>Manfaat untuk user:</b>
                                <ul>
                                    <li>Mengecek apakah label terbaru sudah tercatat di sistem</li>
                                    <li>Memastikan urutan nomor lot sesuai auto increment</li>
                                    <li>Melacak siapa operator terakhir yang mencetak label</li>
                                    <li>Mempermudah troubleshooting jika ada duplikasi atau gap nomor</li>
                                </ul><br>

                                <b>Catatan:</b><br>
                                - Jika tidak ada data, sistem akan menampilkan pesan <i>"No lot history available"</i><br>
                                - Daftar ini hanya bersifat <b>informasi cepat</b>, detail lengkap bisa dilihat di menu Data Label.
                            </div>
                        </div>
                    </div>

                    {{-- GUIDE --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseGuide">
                                    <span class="glyphicon glyphicon-question-sign" style="margin-right:8px;"></span> 10.
                                    Panduan / Help
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