<?php
session_start();
require_once('configs/default.php');
include_once('includes/header.php');

// initial db

$hide_body = false;

function PostData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  // db
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $data = $db->getOne($table);
  $temp = false;
  if ($db->count > 0) {
    $temp = true;
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
  $data = PostData("cuti_militer", "nrp");
  $hide_body = $data[1]; // temp
}
if (isset($_POST['btn_pns'])) {
  $data = PostData("cuti_pns", "nip");
  $hide_body = $data[1]; // temp
}
if (isset($_POST['btn_tks'])) {
  $data = PostData("cuti_tks", "nit");
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
  <div class="col-md-5">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1 <?= $hide_body ?  "hide-body" : "" ?>">
        <h3 class="text-center">PENGAJUAN CUTI</h3>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="text" onkeyup="isi_otomatis('tni')" name="nrp" id="nrp" class="form-control" placeholder="NRP" required></td>
                  </div>
                  <div class="form-group">
                    <label for="nama_tni">NAMA</label>
                    <input type="text" class="form-control" name="nama_tni" id="nama_tni" disabled required>
                  </div>
                  <div class="form-group">
                    <label for="pangkat_tni">PANGKAT</label>
                    <input type="text" class="form-control" name="pangkat_tni" id="pangkat_tni" disabled required>
                  </div>
                  <div class="form-group">
                    <label for="corps_tni">CORPS</label>
                    <input type="text" class="form-control" name="corps_tni" id="corps_tni" disabled required>
                  </div>
                  <div class="form-group">
                    <label for="jabatan_tni">JABATAN</label>
                    <input type="text" class="form-control" name="jabatan_tni" id="jabatan_tni" disabled required>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL AWAL CUTI</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                      <input type="text" name="tanggal_awal_cuti" class="form-control datetimepicker-input" data-target="#reservationdate1" required />
                      <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL KEMBALI CUTI</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                      <input type="text" name="tanggal_kembali_cuti" class="form-control datetimepicker-input" data-target="#reservationdate2" required />
                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="TUJUANCUTI">TUJUAN CUTI</label>
                    <input type="text" name="tujuan_cuti" class="form-control" id="tujuan_cuti" placeholder="Masukan Tujuan Cuti Anda" required>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nrp">NIP</label>
                    <input type="text" onkeyup="isi_otomatis('pns')" name="nip" id="nip" class="form-control" placeholder="NIP"></td>
                  </div>
                  <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" name="nama" class="form-control" id="nama_pns" disabled placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="gologan">GOLONGAN</label>
                    <input type="text" name="golongan" class="form-control" id="golongan_pns" disabled placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="penugasan">PENUGASAN</label>
                    <input type="text" name="penugasan" class="form-control" id="penugasan_pns" disabled placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">JABATAN</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan_pns" disabled placeholder="Masukan Jabatan" required>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL AWAL CUTI</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <input type="text" name="tanggal_awal_cuti" class="form-control datetimepicker-input" data-target="#reservationdate3" required />
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL KEMBALI CUTI</label>
                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                      <input type="text" name="tanggal_kembali_cuti" class="form-control datetimepicker-input" data-target="#reservationdate4" required />
                      <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="TUJUANCUTI">TUJUAN CUTI</label>
                    <input type="text" name="tujuan_cuti" class="form-control" id="tujuan_cuti" placeholder="Masukan Tujuan Cuti Anda" required>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nit">NIT</label>
                    <input type="text" onkeyup="isi_otomatis('tks')" name="nit" id="nit" class="form-control" placeholder="NIT"></td>
                  </div>
                  <div class="form-group">
                    <label for="nama_tks">NAMA</label>
                    <input type="text" name="nama" class="form-control" id="nama_tks" disabled placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="penugasan">PENUGASAN</label>
                    <input type="text" name="penugasan" class="form-control" id="penugasan_tks" disabled placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL AWAL CUTI</label>
                    <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                      <input type="text" name="tanggal_awal_cuti" class="form-control datetimepicker-input" data-target="#reservationdate5" required />
                      <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TANGGAL KEMBALI CUTI</label>
                    <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                      <input type="text" name="tanggal_kembali_cuti" class="form-control datetimepicker-input" data-target="#reservationdate6" required />
                      <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="TUJUANCUTI">TUJUAN CUTI</label>
                    <input type="text" name="tujuan_cuti" class="form-control" id="tujuan_cuti" placeholder="Masukan Tujuan Cuti Anda" required>
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
          TESTING
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

<!-- Bootstrap 4 -->
<script src="<?= BASE_URL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= BASE_URL ?>/assets/js/adminlte.js"></script>

<script src="<?= BASE_URL ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="<?= BASE_URL ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= BASE_URL ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Sweetalert -->
<script src="<?= BASE_URL ?>/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script type="text/javascript">
  // reset setiap field input jika pindah tab
  $('a[data-toggle="pill"]').on('click', function(e) {
    $('.form-group input[type="text"]').val('');
  });

  function isi_otomatis(devisi) {
    var id = 0;
    if ($("#nrp").val() != '') {
      id = $("#nrp").val()
    } else if ($("#nip").val() != '') {
      id = $("#nip").val()
    } else if ($("#nit").val() != '') {
      id = $("#nit").val()
    }
    $.ajax({
      url: 'ajaxproses',
      data: {
        id: id,
        devisi: devisi
      },
      success: function(data) {
        obj = JSON.parse(data);
        if (devisi == 'tni') {
          $('#nama_tni').val(obj.nama);
          $('#pangkat_tni').val(obj.pangkat);
          $('#corps_tni').val(obj.corps);
          $('#jabatan_tni').val(obj.jabatan);
        } else if (devisi == 'pns') {
          $('#nama_pns').val(obj.nama);
          $('#golongan_pns').val(obj.golongan);
          $('#penugasan_pns').val(obj.penugasan);
          $('#jabatan_pns').val(obj.jabatan);
        } else if (devisi == 'tks') {
          $('#nama_tks').val(obj.nama);
          $('#penugasan_tks').val(obj.penugasan);
        }
      },
    });
  };

  $(function() {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
  //Date picker
  for (let i = 1; i <= 6; i++) {
    // console.log('#reservationdate' + i);
    $('#reservationdate' + i).datetimepicker({
      format: 'YYYY-MM-DD',
      minDate: new Date()
    });
  }
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