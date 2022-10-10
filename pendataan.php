<?php
session_start();
require_once('configs/default.php');
include_once('includes/header.php');

$db = dbInstance();

if (isset($_POST['btn_tni'])) {
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);

  $res = $db->insert('militer', $input);
  if ($res)
    $_SESSION['sukses_simpan'] = 1;
  else
    $_SESSION['gagal_simpan'] = 1;
}

?>

<style>
  body {
    overflow-x: hidden !important;
  }

  .sec-footer {
    right: 0;
    bottom: 0;
    left: 0;
    text-align: center;
  }
</style>

<div class="row justify-content-center mt-3">
  <div class="col-md-8">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="pt-2 px-3">
            <h3 class="card-title">PEGEWAI</h3>
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
            <form method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda" required>
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL LAHIR</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-date-format="YYYY-MM-DD" data-target="#reservationdate" required />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>AGAMA</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                      <option selected="selected" value="" disabled>AGAMA</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="BUDHA">BUDHA</option>
                      <option value="HINDU">HINDU</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Umum" required>
                  </div>
                  <div class="form-group">
                    <label for="pendidikan_militer">PENDIDIKAN MILITER</label>
                    <input type="text" name="pendidikan_militer" class="form-control" id="pendidikan_militer" placeholder="Masukan Pendidikan Militer" required>
                  </div>
                  <div class="form-group">
                    <label>TMT TNI</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                      <input type="text" name="tmt_tni" class="form-control datetimepicker-input" data-target="#reservationdate2" required />
                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>STATUS PERNIKAHAN</label>
                    <select class="form-control select2bs4" name="status_perkawinan" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>STATUS</option>
                      <option value="MENIKAH">MENIKAH</option>
                      <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Masukan NRP" required>
                  </div>
                  <div class="form-group">
                    <label>JENIS KELAMIN</label>
                    <select class="form-control select2bs4" style="width: 100%;" required>
                      <option selected="selected" disabled>JENIS KELAMIN</option>
                      <option value="laki-laki">LAKI-LAKI</option>
                      <option value="perempuan">PEREMPUAN</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pangkat">PANGKAT</label>
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
                    <label for="corps">CORPS</label>
                    <input type="text" name="corps" class="form-control" id="corps" placeholder="Masukan Corps Satuan" required>
                  </div>
                  <div class="form-group">
                    <label>TMT CORPS</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest" required>
                      <input type="text" name="tmt_corps" class="form-control datetimepicker-input" data-target="#reservationdate3" />
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">JABATAN</label>
                    <select class="form-control select2bs4" name="jabatan" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>JABATAN</option>
                      <option value="1">KARUMKIT</option>
                      <option value="2">WAKARUMKIT</option>
                      <option value="3">KAKOMED</option>
                      <option value="4">KAINSTAL</option>
                      <option value="5">KASI/KADEP</option>
                      <option value="6">KAUR</option>
                      <option value="7">PAUR</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>TMT JABATAN</label>
                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                      <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate4" required />
                      <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>GOLONGAN DARAH</label>
                    <select class="form-control select2bs4" name="gol_darah" style="width: 100%;" required>
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
                <button type="submit" class="btn btn-primary" name="btn_tni">Kirim</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
            <!-- ini Form PNS -->
            <form method="post">
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
                    <label for="golongan">GOLONGAN</label>
                    <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Masukan Golongan">
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
                </div>
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary" name="btn_pns">Kirim</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
            <!-- ini Form TKS -->
            <form method="post">
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
                    <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate10" />
                      <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
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
                    <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                      <input type="text" name="tahun_lulus" class="form-control datetimepicker-input" data-target="#reservationdate11" />
                      <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
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
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nip">NIT</label>
                    <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukan Nip">
                  </div>
                  <div class="form-group">
                    <label for="golongan">GOLONGAN</label>
                    <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Masukan Golongan">
                  </div>
                  <div class="form-group">
                    <label for="sprint">SPRINT TKS</label>
                    <input type="text" name="sprint" class="form-control" id="sprint" placeholder="Masukan Sprint TKS">
                  </div>
                  <div class="form-group">
                    <label>TANGGAL SPRINT</label>
                    <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                      <input type="text" name="tanggal_sprint" class="form-control datetimepicker-input" data-target="#reservationdate12" />
                      <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TMT TKS</label>
                    <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                      <input type="text" name="tmt_sprint_tks" class="form-control datetimepicker-input" data-target="#reservationdate13" />
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
                <button type="submit" class="btn btn-primary" name="btn_tks">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

<footer class="sec-footer">
  <strong>Copyright &copy; <a href="#">IT RS Tk. II dr. AK Gani</a>.</strong>
</footer>

<!-- jQuery -->
<script src="<?= BASE_URL ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASE_URL ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= BASE_URL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="<?= BASE_URL ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= BASE_URL ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Sweetalert -->
<script src="<?= BASE_URL ?>/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

  //Date picker
  for (i = 1; i < 13; i++) {
    $res = "reservationdate".i;
    $($res).datetimepicker({
      format: 'YYYY-MM-DD'
    });
  }
  $('#reservationdate').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate2').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate3').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate4').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate5').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate6').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate7').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate8').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate9').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate10').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate11').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate12').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#reservationdate13').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  var Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 3000
  });
</script>

<?php
if (isset($_SESSION['sukses_simpan'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'success',
      title: 'Data Anda sudah tersimpan, Terimakasih.'
    })
  </script>
<?php unset($_SESSION['sukses_simpan']);
} ?>

<?php
if (isset($_SESSION['gagal_simpan'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: 'Data Anda gagal tersimpan!'
    })
  </script>
<?php unset($_SESSION['gagal_simpan']);
} ?>

</body>

</html>