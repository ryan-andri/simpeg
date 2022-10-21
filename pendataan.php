<?php
session_start();
require_once('configs/default.php');
include_once('includes/header.php');

function PostData($table, $key)
{
  // ambil inputan
  $input = filter_input_array(INPUT_POST);
  // exclude btn_* dari array
  array_splice($input, count($input) - 1, 1);
  // load db
  $db = dbInstance();
  // query
  $db->where($key, $input[$key]);
  $data = $db->getOne($table);
  $temp = false;
  if ($db->count > 0) {
    $_SESSION['data_exist'] = 1;
  } else {
    $res = $db->insert($table, $input);
    if ($res)
      $_SESSION['sukses_simpan'] = 1;
    else
      $_SESSION['gagal_simpan'] = 1;
  }
  return array($data, $temp);
}

// functional button kirim
if (isset($_POST['btn_tni'])) {
  $data = PostData("militer", "nrp");
  $hide_body = $data[1]; // temp
}
if (isset($_POST['btn_pns'])) {
  $data = PostData("pns", "nip");
  $hide_body = $data[1]; // temp
}
if (isset($_POST['btn_tks'])) {
  $data = PostData("tks", "nit");
  $hide_body = $data[1]; // temp
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

  .hide-body {
    display: none;
  }
</style>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1 <?= $hide_body ?  "hide-body" : "" ?>">
        <h3 class="text-center">SIMPEG</h3>
        <ul class="nav nav-tabs d-flex justify-content-center" id="custom-tabs-two-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="tabs-tni" data-toggle="pill" href="#custom-tabs-tni" role="tab" aria-controls="custom-tabs-tni" aria-selected="true">FORM TNI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tabs-pns" data-toggle="pill" href="#custom-tabs-pns" role="tab" aria-controls="custom-tabs-pns" aria-selected="false">FORM PNS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tabs-tks" data-toggle="pill" href="#custom-tabs-tks" role="tab" aria-controls="custom-tabs-tks" aria-selected="false">FORM TKS</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content <?= $hide_body ?  "hide-body" : "" ?>" id="custom-tabs-two-tabContent">
          <!-- ini Form TNI  -->
          <div class="tab-pane fade show active" id="custom-tabs-tni" role="tabpanel" aria-labelledby="tabs-tni">
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
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-date-format="YYYY-MM-DD" data-target="#reservationdate" required />
                      <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
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
                    <input type="number" name="nrp" class="form-control" id="nrp" placeholder="Masukan NRP" required>
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
                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan" required>
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
          <div class="tab-pane fade" id="custom-tabs-pns" role="tabpanel" aria-labelledby="tabs-pns">
            <!-- ini Form PNS -->
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
                    <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate5" required />
                      <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>AGAMA</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                      <option selected="selected" disabled>AGAMA</option>
                      <option value="islam">ISLAM</option>
                      <option value="kristen">KRISTEN</option>
                      <option value="budha">BUDHA</option>
                      <option value="hindu">HINDU</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Terakhir" required>
                  </div>
                  <div class="form-group">
                    <label>TAHUN LULUS</label>
                    <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                      <input type="text" name="tahun_lulus" class="form-control datetimepicker-input" data-target="#reservationdate6" required />
                      <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>STATUS PERNIKAHAN</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="status_perkawinan" required>
                      <option selected="selected" value="" disabled>STATUS</option>
                      <option value="MENIKAH">MENIKAH</option>
                      <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>JENIS KELAMIN</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                      <option selected="selected" value="" disabled>JENIS KELAMIN</option>
                      <option value="laki-laki">LAKI-LAKI</option>
                      <option value="perempuan">PEREMPUAN</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ijazah">IJAZAH</label>
                    <input type="text" name="ijazah" class="form-control" id="ijazah" placeholder="Masukan Ijazah" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="number" name="nip" class="form-control" id="nip" placeholder="Masukan Nip" required>
                  </div>
                  <div class="form-group">
                    <label for="golongan">GOLONGAN</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="golongan" required>
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
                    <div class="input-group date" id="reservationdate7" data-target-input="nearest" required>
                      <input type="text" name="tmt_golongan" class="form-control datetimepicker-input" data-target="#reservationdate7" />
                      <div class="input-group-append" data-target="#reservationdate7" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">JABATAN</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan" required>
                  </div>
                  <div class="form-group">
                    <label>TMT JABATAN</label>
                    <div class="input-group date" id="reservationdate8" data-target-input="nearest" required>
                      <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate8" />
                      <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="latihan_jabatan">LATIHAN JABATAN</label>
                    <input type="text" name="latihan_jabatan" class="form-control" id="latihan_jabatan" placeholder="Masukan Latihan jabatan" required>
                  </div>
                  <div class="form-group">
                    <label>TAHUN JABATAN</label>
                    <div class="input-group date" id="reservationdate9" data-target-input="nearest" required>
                      <input type="text" name="tahun_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate9" />
                      <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>GOLONGAN DARAH</label>
                    <select class="form-control select2bs4" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>GOLONGAN DARAH</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="O">O</option>
                      <option value="AB">AB</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="penugasan">PENUGASAN</label>
                    <input type="text" name="penugasan" class="form-control" id="penugasan" placeholder="Masukan Penugasan" required>
                  </div>
                </div>
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary" name="btn_pns">Kirim</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="custom-tabs-tks" role="tabpanel" aria-labelledby="tabs-tks">
            <!-- ini Form TKS -->
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
                    <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate10" required />
                      <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
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
                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Terakhir" required>
                  </div>
                  <div class="form-group">
                    <label>TAHUN LULUS</label>
                    <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                      <input type="text" name="tahun_lulus" class="form-control datetimepicker-input" data-target="#reservationdate11" required />
                      <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>STATUS PERNIKAHAN</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="status_perkawinan" required>
                      <option selected="selected" value="" disabled>STATUS</option>
                      <option value="MENIKAH">MENIKAH</option>
                      <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>JENIS KELAMIN</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                      <option selected="selected" value="" disabled>JENIS KELAMIN</option>
                      <option value="laki-laki">LAKI-LAKI</option>
                      <option value="perempuan">PEREMPUAN</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nip">NIT</label>
                    <input type="number" name="nit" class="form-control" id="nit" placeholder="Masukan nit" required>
                  </div>
                  <div class="form-group">
                    <label for="golongan">GOLONGAN</label>
                    <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Masukan Golongan" required>
                  </div>
                  <div class="form-group">
                    <label for="sprin_tks">SPRINT TKS</label>
                    <input type="text" name="sprin_tks" class="form-control" id="sprin_tks" placeholder="Masukan Sprint TKS" required>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL SPRINT</label>
                    <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                      <input type="text" name="tanggal_sprin" class="form-control datetimepicker-input" data-target="#reservationdate12" required />
                      <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TMT TKS</label>
                    <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                      <input type="text" name="tmt_tks" class="form-control datetimepicker-input" data-target="#reservationdate13" required />
                      <div class="input-group-append" data-target="#reservationdate13" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="penugasan">PENUGASAN</label>
                    <input type="text" name="penugasan" class="form-control" id="penugasan" placeholder="Masukan Penugasan" required>
                  </div>
                  <div class="form-group">
                    <label>KUALIFIKASI</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="kualifikasi" required>
                      <option selected="selected" value="" disabled>KUALIFIKASI</option>
                      <option value="MEDIS">MEDIS</option>
                      <option value="PARAMEDIS">PARAMEDIS</option>
                      <option value="NON-MEDIS">NON-MEDIS</option>
                      <option value="NAKES LAINNYA">NAKES LAINNYA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>GOLONGAN DARAH</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="golongan_darah" required>
                      <option selected="selected" value="" disabled>GOLONGAN DARAH</option>
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
        <div class="tab-content <?= !$hide_body ?  "hide-body" : "" ?>">
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

<footer class="sec-footer">
  <strong>Copyright &copy; <a href="#">IT RS Tk. II dr. AK Gani</a>.</strong>
</footer>

<!-- AdminLTE App -->
<script src="<?= BASE_URL ?>/assets/js/adminlte.js"></script>

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
  for (let i = 1; i <= 13; i++) {
    // console.log('#reservationdate' + i);
    $('#reservationdate' + i).datetimepicker({
      format: 'YYYY-MM-DD'
    });
  }
  var Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 3000
  });

  $(function() {
    $("#datatotable").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatotable_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
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

<?php
if (isset($_SESSION['data_exist'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: 'NRP/NIP/NIT anda sudah terdaftar, Terimakasih.'
    })
  </script>
<?php unset($_SESSION['data_exist']);
} ?>


</body>

</html>