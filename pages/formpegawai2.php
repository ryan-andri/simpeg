<?php
session_start();
require_once('../configs/default.php');
include_once('../includes/header.php');
include_once('../configs/dbConnection.php');
$db = new dbConnection();
$wee = $db::getInstance();
?>


<div class="hold-transition">
  <div class="row justify-content-center mt-3">
    <div class="col-md-8">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3">
              <h3 class="card-title">PEGAWAI</h3>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">FORM TNI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">FORM PNS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">FORM TKS</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
              <!-- ini Form TNI  -->
              <form action="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">NAMA</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda">
                    </div>
                    <div class="form-group">
                      <label for="tempat_lahir">TEMPAT LAHIR</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>AGAMA</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>AGAMA</option>
                        <option value="islam">ISLAM</option>
                        <option value="kristen">KRISTEN</option>
                        <option value="budha">BUDHA</option>
                        <option value="hindu">HINDU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                      <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Umum">
                    </div>
                    <div class="form-group">
                      <label for="pendidikan_militer">PENDIDIKAN MILITER</label>
                      <input type="text" name="pendidikan_militer" class="form-control" id="pendidikan_militer" placeholder="Masukan Pendidikan Militer">
                    </div>
                    <div class="form-group">
                      <label>TMT TNI</label>
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="tmt_tni" class="form-control datetimepicker-input" data-target="#reservationdate2" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>STATUS PERNIKAHAN</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>STATUS</option>
                        <option value="kawin">KAWIN</option>
                        <option value="belum_kawin">BELUM KAWIN</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nrp">NRP</label>
                      <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Masukan NRP">
                    </div>
                    <div class="form-group">
                      <label>JENIS KELAMIN</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>JENIS KELAMIN</option>
                        <option value="laki-laki">LAKI-LAKI</option>
                        <option value="perempuan">PEREMPUAN</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>PANGKAT</label>
                      <select class="form-control select2bs4" style="width: 100%;">
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
                      <label>COPRS</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>COPRS</option>
                        <option value="Ckm">Ckm</option>
                        <option value="Cku">Cku</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>TMT CORPS</label>
                      <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" name="tmt_corps" class="form-control datetimepicker-input" data-target="#reservationdate3" />
                        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatan">JABATAN</label>
                      <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan">
                    </div>
                    <div class="form-group">
                      <label>TMT JABATAN</label>
                      <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                        <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate4" />
                        <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>GOLONGAN DARAH</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>GOLONGAN DARAH</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
              <!-- ini Form PNS -->
              <form action="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">NAMA</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda">
                    </div>
                    <div class="form-group">
                      <label for="tempat_lahir">TEMPAT LAHIR</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                        <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate5" />
                        <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>AGAMA</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>AGAMA</option>
                        <option value="islam">ISLAM</option>
                        <option value="kristen">KRISTEN</option>
                        <option value="budha">BUDHA</option>
                        <option value="hindu">HINDU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                      <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Terakhir">
                    </div>
                    <div class="form-group">
                      <label>TAHUN LULUS</label>
                      <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                        <input type="text" name="tahun_lulus" class="form-control datetimepicker-input" data-target="#reservationdate6" />
                        <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>STATUS PERNIKAHAN</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>STATUS</option>
                        <option value="kawin">KAWIN</option>
                        <option value="belum_kawin">BELUM KAWIN</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>JENIS KELAMIN</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>JENIS KELAMIN</option>
                        <option value="laki-laki">LAKI-LAKI</option>
                        <option value="perempuan">PEREMPUAN</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="ijazah">IJAZAH</label>
                      <input type="text" name="ijazah" class="form-control" id="ijazah" placeholder="Masukan Ijazah">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukan Nip">
                    </div>
                    <div class="form-group">
                      <label>GOLONGAN</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>GOLONGAN</option>
                        <option value="IV/A">IV/A</option>
                        <option value="III/D">III/D</option>
                        <option value="III/C">III/C</option>
                        <option value="III/B">III/B</option>
                        <option value="III/A">III/A</option>
                        <option value="II/D">II/D</option>
                        <option value="II/C">II/C</option>
                        <option value="II/B">II/B</option>
                        <option value="I/D">I/D</option>
                        <option value="I/C">I/C</option>
                        <option value="I/B">I/B</option>
                        <option value="I/A">I/A</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>TMT GOLONGAN</label>
                      <div class="input-group date" id="reservationdate7" data-target-input="nearest">
                        <input type="text" name="tmt_golongan" class="form-control datetimepicker-input" data-target="#reservationdate7" />
                        <div class="input-group-append" data-target="#reservationdate7" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatan">JABATAN</label>
                      <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan">
                    </div>
                    <div class="form-group">
                      <label>TMT JABATAN</label>
                      <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                        <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate8" />
                        <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="latihan_jabatan">LATIHAN JABATAN</label>
                      <input type="text" name="latihan_jabatan" class="form-control" id="latihan_jabatan" placeholder="Masukan Latihan jabatan">
                    </div>
                    <div class="form-group">
                      <label>TAHUN JABATAN</label>
                      <div class="input-group date" id="reservationdate9" data-target-input="nearest">
                        <input type="text" name="tahun_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate9" />
                        <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>GOLONGAN DARAH</label>
                      <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" disabled>GOLONGAN DARAH</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="penugasan">RUANG PENUGASAN</label>
                      <input type="text" name="penugasan" class="form-control" id="penugasan" placeholder="Masukan Penugasan">
                    </div>
                  </div>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
              <!-- ini Form TKS -->
              <form action="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">NAMA</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda">
                    </div>
                    <div class="form-group">
                      <label for="tempat_lahir">TEMPAT LAHIR</label>
                      <input type="text" name="tempatlahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                        <input type="text" name="tanggallahir" class="form-control datetimepicker-input" data-target="#reservationdate10" />
                        <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>AGAMA</label>
                      <select class="form-control select2bs4" name="agama" style="width: 100%;">
                        <option selected="selected" disabled>AGAMA</option>
                        <option value="islam">ISLAM</option>
                        <option value="kristen">KRISTEN</option>
                        <option value="budha">BUDHA</option>
                        <option value="hindu">HINDU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pendidikanumum">PENDIDIKAN UMUM</label>
                      <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Terakhir">
                    </div>
                    <div class="form-group">
                      <label>TAHUN LULUS</label>
                      <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                        <input type="text" name="tahunlulus" class="form-control datetimepicker-input" data-target="#reservationdate11" />
                        <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>STATUS PERNIKAHAN</label>
                      <select class="form-control select2bs4" name="statuspernikahan" style="width: 100%;">
                        <option selected="selected" disabled>STATUS</option>
                        <option value="kawin">KAWIN</option>
                        <option value="belum_kawin">BELUM KAWIN</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>JENIS KELAMIN</label>
                      <select class="form-control select2bs4" name="jeniskelamin" style="width: 100%;">
                        <option selected="selected" disabled>JENIS KELAMIN</option>
                        <option value="laki-laki">LAKI-LAKI</option>
                        <option value="perempuan">PEREMPUAN</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nip">NIT</label>
                      <input type="text" name="nit" class="form-control" id="nip" placeholder="Masukan Nip">
                    </div>
                    <div class="form-group">
                      <label for="golongan">GOLONGAN</label>
                      <input type="text" name="golongantks" class="form-control" id="golongan" placeholder="Masukan Golongan">
                    </div>
                    <div class="form-group">
                      <label for="sprint">SPRINT TKS</label>
                      <input type="text" name="sprint" class="form-control" id="sprint" placeholder="Masukan Sprint TKS">
                    </div>
                    <div class="form-group">
                      <label>TANGGAL SPRINT</label>
                      <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                        <input type="text" name="tanggalsprint" class="form-control datetimepicker-input" data-target="#reservationdate12" />
                        <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>TMT TKS</label>
                      <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                        <input type="text" name="tmtsprinttks" class="form-control datetimepicker-input" data-target="#reservationdate13" />
                        <div class="input-group-append" data-target="#reservationdate13" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penugasan">PENUGASAN</label>
                      <input type="text" name="penugasan" class="form-control" id="penugasan" placeholder="Masukan Penugasan">
                    </div>
                    <div class="form-group">
                      <label for="kualifikasi">KUALIFIKASI</label>
                      <input type="text" name="kualifikasi" class="form-control" id="kualifikasi" placeholder="Masukan Kualifikasi">
                    </div>
                    <div class="form-group">
                      <label>GOLONGAN DARAH</label>
                      <select class="form-control select2bs4" name="golongandarahtks" style="width: 100%;">
                        <option selected="selected" disabled>GOLONGAN DARAH</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                      </select>
                    </div>
                  </div>
                </div>

                <?php
                if (isset($_POST['SIMPAN'])) {
                  $nit = $_POST['nit'];
                  $nama = $_POST['nama'];
                  $tempatlahir = $_POST['tempatlahir'];
                  $tanggallahir = $_POST['tanggallahir'];
                  $agama = $_POST['agama'];
                  $pendidikanumum = $_POST['pendidikanumum'];
                  $tahunlulus = $_POST['tahunlulus'];
                  $statuspernikahan = $_POST['statuspernikahan'];
                  $jeniskelamin = $_POST['jeniskelamin'];
                  $golongantks = $_POST['golongantks'];
                  $sprintks = $_POST['sprinttks'];
                  $tanggalsprint = $_POST['tanggalsprint'];
                  $tmttks = $_POST['tmttks'];
                  $penugasan = $_POST['penugasan'];
                  $kualifikasi = $_POST['kualifikasi'];
                  $golongandarahtks = $_POST['golongandarahtks'];

                  $querry = "INSERT INTO tks set nit='$nit', nama='$nama', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', agama='$agama',
                             pendidikanumum='$pendidikanumum', tahunlulus='$tahunlulus', statuspernikahan='$statuspernikahan', jeniskelamin ='$jeniskelamin',
                             golongantks='$golongantks', sprinttks='$sprintks', tanggalsprint='$tanggalsprint', tmttks='$tmttks', penugasan='$penugasan',
                             kualifikasi='$kualifikasi', golongadarahtks='$golongandarahtks'";
                  if (!$query ){
                    echo "<script>alert('Gagal di tambahkan!')</script>";
                    } else{
                    echo "<script>alert('Data berhasil di tambahkan!')</script> ";
                    echo "<meta http-equiv='refresh' content='0;url=./formpegawai2.php'>";
                    }
                    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                }
                ?>
                <div class="">
                  <button name="SIMPAN" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>

<?php
include_once('../includes/footer.php');
?>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

  //Date picker
  $('#reservationdate').datetimepicker({
    format: 'L'
  });
  $('#reservationdate2').datetimepicker({
    format: 'L'
  });
  $('#reservationdate3').datetimepicker({
    format: 'L'
  });
  $('#reservationdate4').datetimepicker({
    format: 'L'
  });
  $('#reservationdate5').datetimepicker({
    format: 'L'
  });
  $('#reservationdate6').datetimepicker({
    format: 'L'
  });
  $('#reservationdate7').datetimepicker({
    format: 'L'
  });
  $('#reservationdate8').datetimepicker({
    format: 'L'
  });
  $('#reservationdate9').datetimepicker({
    format: 'L'
  });
  $('#reservationdate10').datetimepicker({
    format: 'L'
  });
  $('#reservationdate11').datetimepicker({
    format: 'L'
  });
  $('#reservationdate12').datetimepicker({
    format: 'L'
  });
  $('#reservationdate13').datetimepicker({
    format: 'L'
  });
</script>