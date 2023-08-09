<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pendataan</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('theme/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('theme/css/sb-admin-2.min.css') !!}" rel="stylesheet">

    {{-- datepicker --}}
    <link rel="stylesheet" href="{!! asset('theme/vendor/datetimepicker/css/tempusdominus-bootstrap-4.min.css') !!}" />
</head>

<body>
    <div class="m-2">

        {{-- flash message --}}
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($message = Session::get('dupe'))
        <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card tab-card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab"
                            aria-controls="One" aria-selected="true">TNI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two"
                            aria-selected="false">PNS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab"
                            aria-controls="Three" aria-selected="false">TKS</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <!-- TAB TNI -->
                <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                    <form action="{{ route('pendataan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input name="devisi" type="hidden" value="tni">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Masukan Nama Anda">
                                    @error('nama')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                        placeholder="Masukan Tempat Lahir">
                                    @error('tempat_lahir')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL LAHIR</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" name="tanggal_lahir"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                                        <div class="input-group-append" data-target="#datetimepicker1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>AGAMA</label>
                                    <select class="form-control" style="width: 100%;" name="agama">
                                        <option selected="selected" value="" disabled>AGAMA</option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN">KRISTEN</option>
                                        <option value="BUDHA">BUDHA</option>
                                        <option value="HINDU">HINDU</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum"
                                        placeholder="Masukan Pendidikan Umum">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_militer">PENDIDIKAN MILITER</label>
                                    <input type="text" name="pendidikan_militer" class="form-control"
                                        id="pendidikan_militer" placeholder="Masukan Pendidikan Militer">
                                </div>
                                <div class="form-group">
                                    <label>TMT TNI</label>
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" name="tmt_tni" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker2" />
                                        <div class="input-group-append" data-target="#datetimepicker2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>STATUS PERNIKAHAN</label>
                                    <select class="form-control" name="status_perkawinan" style="width: 100%;">
                                        <option selected="selected" value="" disabled>STATUS</option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrp">NRP</label>
                                    <input type="number" name="nrp" class="form-control" id="nrp"
                                        placeholder="Masukan NRP">
                                </div>
                                <div class="form-group">
                                    <label>JENIS KELAMIN</label>
                                    <select class="form-control" style="width: 100%;" name="jenis_kelamin">
                                        <option selected="selected" disabled>JENIS KELAMIN</option>
                                        <option value="laki-laki">LAKI-LAKI</option>
                                        <option value="perempuan">PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">PANGKAT</label>
                                    <select class="form-control" style="width: 100%;" name="pangkat">
                                        <option selected="selected" disabled>PANGKAT</option>
                                        <option value="Kolonel">Kolonel</option>
                                        <option value="Letkol">Letkol</option>
                                        <option value="Mayor">Mayor</option>
                                        <option value="Kapten">Kapten</option>
                                        <option value="Lettu">Lettu</option>
                                        <option value="Letda">Letda</option>
                                        <option value="Peltu">Peltu</option>
                                        <option value="Pelda">Pelda</option>
                                        <option value="Serma">Serma</option>
                                        <option value="Serka">Serka</option>
                                        <option value="Sertu">Sertu</option>
                                        <option value="Serda">Serda</option>
                                        <option value="Kopka">Kopka</option>
                                        <option value="Koptu">Koptu</option>
                                        <option value="Kopda">Kopda</option>
                                        <option value="Praka">Praka</option>
                                        <option value="Pratu">Pratu</option>
                                        <option value="Prada">Prada</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="corps">CORPS</label>
                                    <input type="text" name="corps" class="form-control" id="corps"
                                        placeholder="Masukan Corps Satuan">
                                </div>
                                <div class="form-group">
                                    <label>TMT CORPS</label>
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" name="tmt_corps" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker3" />
                                        <div class="input-group-append" data-target="#datetimepicker3"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">JABATAN</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan"
                                        placeholder="Masukan Jabatan">
                                </div>
                                <div class="form-group">
                                    <label>TMT JABATAN</label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker4" />
                                        <div class="input-group-append" data-target="#datetimepicker4"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>GOLONGAN DARAH</label>
                                    <select class="form-control" name="gol_darah" style="width: 100%;">
                                        <option selected="selected" disabled>GOLONGAN DARAH</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Kirim</button>
                    </form>
                </div>

                {{--TAB PNS --}}
                <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                    <form action="{{ route('pendataan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input name="devisi" type="hidden" value="pns">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Masukan Nama Anda">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                        placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL LAHIR</label>
                                    <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                        <input type="text" name="tanggal_lahir"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker5" />
                                        <div class="input-group-append" data-target="#datetimepicker5"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>AGAMA</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="agama">
                                        <option selected="selected" disabled>AGAMA</option>
                                        <option value="islam">ISLAM</option>
                                        <option value="kristen">KRISTEN</option>
                                        <option value="budha">BUDHA</option>
                                        <option value="hindu">HINDU</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum"
                                        placeholder="Masukan Pendidikan Terakhir">
                                </div>
                                <div class="form-group">
                                    <label>TAHUN LULUS</label>
                                    <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                                        <input type="text" name="tahun_lulus" id="tahun_lulus"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker6" />
                                        <div class="input-group-append" data-target="#datetimepicker6"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>STATUS PERNIKAHAN</label>
                                    <select class="form-control select2bs4" style="width: 100%;"
                                        name="status_perkawinan" id="status_perkawinan">
                                        <option selected="selected" value="" disabled>STATUS</option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>JENIS KELAMIN</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin"
                                        id="jenis_kelamin">
                                        <option selected="selected" value="" disabled>JENIS KELAMIN</option>
                                        <option value="laki-laki">LAKI-LAKI</option>
                                        <option value="perempuan">PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ijazah">IJAZAH</label>
                                    <input type="text" name="ijazah" class="form-control" id="ijazah"
                                        placeholder="Masukan Ijazah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="number" name="nip" class="form-control" id="nip"
                                        placeholder="Masukan Nip">
                                </div>
                                <div class="form-group">
                                    <label for="golongan">GOLONGAN</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="golongan"
                                        id="golongan">
                                        <option selected="selected" value="" disabled>GOLONGAN</option>
                                        <option value="IV/A">IV/A</option>
                                        <option value="III/D">III/D</option>
                                        <option value="III/C">III/C</option>
                                        <option value="III/B">III/B</option>
                                        <option value="III/A">III/A</option>
                                        <option value="II/D">II/D</option>
                                        <option value="II/C">II/C</option>
                                        <option value="II/B">II/B</option>
                                        <option value="II/A">II/A</option>
                                        <option value="I/D">I/D</option>
                                        <option value="I/C">I/C</option>
                                        <option value="I/B">I/B</option>
                                        <option value="I/A">I/A</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>TMT GOLONGAN</label>
                                    <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                        <input type="text" name="tmt_golongan" id="tmt_golongan"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker7" />
                                        <div class="input-group-append" data-target="#datetimepicker7"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">JABATAN</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan"
                                        placeholder="Masukan Jabatan">
                                </div>
                                <div class="form-group">
                                    <label>TMT JABATAN</label>
                                    <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                        <input type="text" name="tmt_jabatan" id="tmt_jabatan"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker8" />
                                        <div class="input-group-append" data-target="#datetimepicker8"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="latihan_jabatan">LATIHAN JABATAN</label>
                                    <input type="text" name="latihan_jabatan" class="form-control" id="latihan_jabatan"
                                        placeholder="Masukan Latihan jabatan">
                                </div>
                                <div class="form-group">
                                    <label>TAHUN JABATAN</label>
                                    <div class="input-group date" id="datetimepicker9" data-target-input="nearest">
                                        <input type="text" name="tahun_jabatan" id="tahun_jabatan"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker9" />
                                        <div class="input-group-append" data-target="#datetimepicker9"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>GOLONGAN DARAH</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="golongan_darah"
                                        id="golongan_darah">
                                        <option selected="selected" value="" disabled>GOLONGAN DARAH</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penugasan">PENUGASAN</label>
                                    <input type="text" name="penugasan" class="form-control" id="penugasan"
                                        placeholder="Masukan Penugasan">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary form-control" name="btn_pns">Kirim</button>
                    </form>
                </div>

                {{--TAB TKS --}}
                <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <form action="{{ route('pendataan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input name="devisi" type="hidden" value="tks">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Masukan Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                        placeholder="Masukan Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL LAHIR</label>
                                    <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                                        <input type="text" name="tanggal_lahir"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker10"
                                            required />
                                        <div class="input-group-append" data-target="#datetimepicker10"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>AGAMA</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                                        <option selected="selected" value="" disabled>AGAMA</option>
                                        <option value="islam">ISLAM</option>
                                        <option value="kristen">KRISTEN</option>
                                        <option value="budha">BUDHA</option>
                                        <option value="hindu">HINDU</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum"
                                        placeholder="Masukan Pendidikan Terakhir" required>
                                </div>
                                <div class="form-group">
                                    <label>TAHUN LULUS</label>
                                    <div class="input-group date" id="datetimepicker11" data-target-input="nearest">
                                        <input type="text" name="tahun_lulus" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker11" required />
                                        <div class="input-group-append" data-target="#datetimepicker11"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>STATUS PERNIKAHAN</label>
                                    <select class="form-control select2bs4" style="width: 100%;"
                                        name="status_perkawinan" required>
                                        <option selected="selected" value="" disabled>STATUS</option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>JENIS KELAMIN</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin"
                                        required>
                                        <option selected="selected" value="" disabled>JENIS KELAMIN</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIT</label>
                                    <input type="number" name="nit" class="form-control" id="nit"
                                        placeholder="Masukan nit" required>
                                </div>
                                <div class="form-group">
                                    <label for="golongan">GOLONGAN</label>
                                    <input type="text" name="golongan" class="form-control" id="golongan"
                                        placeholder="Masukan Golongan" required>
                                </div>
                                <div class="form-group">
                                    <label for="sprin_tks">SPRINT TKS</label>
                                    <input type="text" name="sprin_tks" class="form-control" id="sprin_tks"
                                        placeholder="Masukan Sprint TKS" required>
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL SPRINT</label>
                                    <div class="input-group date" id="datetimepicker12" data-target-input="nearest">
                                        <input type="text" name="tanggal_sprin"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker12"
                                            required />
                                        <div class="input-group-append" data-target="#datetimepicker12"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>TMT TKS</label>
                                    <div class="input-group date" id="datetimepicker13" data-target-input="nearest">
                                        <input type="text" name="tmt_tks" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker13" required />
                                        <div class="input-group-append" data-target="#datetimepicker13"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="penugasan">PENUGASAN</label>
                                    <input type="text" name="penugasan" class="form-control" id="penugasan"
                                        placeholder="Masukan Penugasan" required>
                                </div>
                                <div class="form-group">
                                    <label>KUALIFIKASI</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="kualifikasi"
                                        required>
                                        <option selected="selected" value="" disabled>KUALIFIKASI</option>
                                        <option value="MEDIS">MEDIS</option>
                                        <option value="PARAMEDIS">PARAMEDIS</option>
                                        <option value="NON-MEDIS">NON-MEDIS</option>
                                        <option value="NAKES LAINNYA">NAKES LAINNYA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>GOLONGAN DARAH</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="golongan_darah"
                                        required>
                                        <option selected="selected" value="" disabled>GOLONGAN DARAH</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>

    <!-- Include Moment.js CDN -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.0/moment-with-locales.min.js">
    </script>

    {{-- datepicker --}}
    <script src="{!! asset('theme/vendor/datetimepicker/js/tempusdominus-bootstrap-4.min.js') !!}"></script>

    <script type="text/javascript">
        // reset setiap field input jika pindah tab
        $('a[data-toggle="tab"]').on('click', function(e) {
            $('.form-group input[type="text"]').val('');
        });

        //Date picker
        for (let i = 1; i <= 13; i++) {
            // format years
            if (i == 6 || i == 9 || i == 11) {
                $('#datetimepicker' + i).datetimepicker({
                    "allowInputToggle": true,
                    format: 'YYYY'
                });
            } else {
                // format lengkap
                $('#datetimepicker' + i).datetimepicker({
                    "allowInputToggle": true,
                    format: 'YYYY-MM-DD'
                });
            }
        }
    </script>
</body>

</html>