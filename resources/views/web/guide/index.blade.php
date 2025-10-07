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
                        style="margin:0;font-weight:600;font-size:17px;letter-spacing:0.3px;color:black;margin-bottom:8px;margin-top:2px">
                        Guide
                    </h2>
                </div>

                <div class="panel-group" id="accordion">
                    {{-- AUTH --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseAuth">
                                    <span class="fa fa-sign-in" style="margin-right:8px;"></span> 1. Login &
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
                                    <span class="fa fa-dashboard" style="margin-right:8px;"></span> 2.
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
                                    <span class="fa fa-list-alt" style="margin-right:8px;"></span> 3. Data
                                    Label
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDataLabel" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Menu <b>Data Label</b> menampilkan semua label yang sudah dibuat.<br>
                                - Gunakan kolom <b>Search</b> untuk mencari label berdasarkan <code>lot_number</code>.<br>
                                - Data label ditampilkan per halaman (10 item).<br>
                                - Admin dapat mengakses kolom Action untuk mengedit, menghapus, atau mencetak ulang
                                label, sedangkan Operator hanya dapat mengakses kolom Action untuk mengedit dan mencetak ulang saja.
                            </div>
                        </div>
                    </div>

                    {{-- EDIT / DELETE --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit">
                                    <span class="fa fa-pencil" style="margin-right:8px;"></span> 4. Edit &
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
                                    <span class="fa fa-print" style="margin-right:8px;"></span> 5. Print Ulang
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
                                    <span class="fa fa-file-excel-o" style="margin-right:8px;"></span> 6. Export
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
                                    <span class="fa fa-user" style="margin-right:8px;"></span> 7. Manajemen
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
                                    <span class="fa fa-sort" style="margin-right:8px;"></span> 8.
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

                    {{-- LABEL PRINT --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseLabelPrint">
                                    <span class="fa fa-barcode" style="margin-right:8px;"></span> 9. Format
                                    Label & Cara Print
                                </a>
                            </h4>
                        </div>
                        <div id="collapseLabelPrint" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Format Label:</b><br><br>
                                - Label berukuran 8cm x 5cm (sesuai kertas label standar 80mm x 50mm).<br>
                               - Terdiri dari informasi: <code>Lot number</code>, <code>Type/Size</code>, <code>Length</code>, <code>Weight</code>, <code>Date/Shift</code>, <code>Machine no</code>, <code>Pitch</code>, <code>Visual</code>, <code>Operator</code>, <code>QC Test</code>, dan <code>Remark</code>.<br>
                                - kalau <code>extra_length</code> kosong/null/0 → barisnya gak akan ikut dicetak.<br>
                                - Barcode menggunakan format <b>Code 128</b> untuk kemudahan scan.<br><br>

                                <b>Cara Print Label:</b><br><br>
                                1. Pastikan kertas label terpasang dengan benar di printer.<br>
                                2. Gunakan browser Google Chrome untuk hasil terbaik.<br>
                                3. Setelah input data di form, klik tombol <b>Print</b>.<br>
                                4. Jendela print akan terbuka, atur pengaturan sebagai berikut:
                                <ul>
                                    <li>Destination: pilih printer thermal Anda</li>
                                    <li>Paper size: atur ke ukuran custom 80mm x 50mm</li>
                                    <li>Margins: pilih None</li>
                                    <li>Scale: atur ke 100%</li>
                                    <li>Options: hilangkan centang pada Headers and footers serta Background graphics</li>
                                </ul>
                                6. Klik tombol <b>Print</b> untuk mencetak label.<br><br>
                            </div>
                        </div>
                    </div>

                    {{-- HISTORY FEATURE --}}
                    <div class="panel panel-default" style="margin-bottom:10px;border-radius:8px;overflow:hidden;">
                        <div class="panel-heading" style="background:#f8fafc;">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseHistory">
                                    <span class="fa fa-history" style="margin-right:8px;"></span> 10. Fitur Lot History
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
                                    <span class="fa fa-question-circle" style="margin-right:8px;"></span> 11.
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