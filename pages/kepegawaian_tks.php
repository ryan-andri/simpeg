<?php
session_start();
require_once('../configs/default.php');
include_once('../includes/header.php');
include_once('../includes/sidebar.php');

$db = dbInstance();

// Function Tambah Data
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

// Function Edit Data
function EditData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  //db
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $data = $db->update($table, $input);
  $temp = false;
  if ($data)
  {
    $_SESSION['sukses_update'] = 1;
  }else{
    $_SESSION['gagal_update'] = 1;
  }
  return array($data);
}

// Delete Data
function DeleteData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $data = $db->delete($table);
  if ($data)
  {
    $_SESSION['sukses_delete'] = 1;
  }else{
    $_SESSION['gagal_delete'] = 1;
  }
  return array($data);
}


// functional button kirim
if (isset($_POST['btn_tks'])) {
  $data = PostData("tks", "nit");
}
if (isset($_POST['btn_tks_update'])) {
  $data = EditData("tks", "id");
}
if (isset($_POST['btn_tks_delete'])) {
  $data = DeleteData("tks", "id");
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Halaman Kepegawaian-TKS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kepegawaian-tni</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class=" d-flex justify-content-between align-items-center p-4 border border-radius">
                <h4 class="mt-2">Data Pegawai TKS</h4>
                <!-- Tombol trigger Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                  <span><i class="fas fa-plus"></i></span> Tambah Data
                </button>
                <!--Tambah Data Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
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
                                  <option value="LAKI-LAKI">LAKI-LAKI</option>
                                  <option value="PEREMPUAN">PEREMPUAN</option>
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
                  </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>AKSI</th>
                    <th>NO</th>
                    <th>NIT</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TEMPAT LAHIR</th>
                    <th>AGAMA</th>
                    <th>GOLONGAN</th>
                    <th>SPRIN TKS</th>
                    <th>TMT TKS</th>
                    <th>TANGGAL SPRIN</th>
                    <th>PENDIDIKAN UMUM</th>
                    <th>TAHUN LULUS</th>
                    <th>STATUS PERKAWINAN</th>
                    <th>JENIS KELAMIN</th>
                    <th>KUALIFIKASI</th>
                    <th>GOLONGAN DARAH</th>
                    <th>PENUGASAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    $db = $db->get('tks');
                    foreach ($db as $data) :
                  ?>
                  <!--Edit Data Modal -->
                    <div class="modal fade" id="editModal<?= $data['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Data Pegawai : <strong><?= $data['nama'] ?></strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="post">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="nama">NAMA</label>
                                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda" required value="<?php echo $data['nama']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="tempat_lahir">TEMPAT LAHIR</label>
                                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir" required value="<?php echo $data['tempat_lahir']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>TANGGAL LAHIR</label>
                                  <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                                    <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" value="<?php echo $data['tanggal_lahir']; ?>" data-target="#reservationdate10" required />
                                    <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>AGAMA</label>
                                  <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                                    <option selected="selected" value="<?php echo $data['agama']; ?>" disabled><?php echo $data['agama']; ?></option>
                                    <option value="islam">ISLAM</option>
                                    <option value="kristen">KRISTEN</option>
                                    <option value="budha">BUDHA</option>
                                    <option value="hindu">HINDU</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                                  <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Terakhir" required value="<?php echo $data['pendidikan_umum']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>TAHUN LULUS</label>
                                  <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                                    <input type="text" name="tahun_lulus" class="form-control datetimepicker-input" value="<?php echo $data['tahun_lulus']; ?>" data-target="#reservationdate11" required />
                                    <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>STATUS PERNIKAHAN</label>
                                  <select class="form-control select2bs4" style="width: 100%;" name="status_perkawinan" required>
                                    <option selected="selected" value="<?php echo $data['status_pernikahan']; ?>" disabled>STATUS</option>
                                    <option value="MENIKAH">MENIKAH</option>
                                    <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>JENIS KELAMIN</label>
                                  <select class="form-control select2bs4" style="width: 100%;" name="jenis_kelamin" required>
                                    <option selected="selected" value="<?php echo $data['jenis_kelamin']; ?>" disabled><?php echo $data['jenis_kelamin']; ?></option>
                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="nip">NIT</label>
                                  <input type="number" name="nit" class="form-control" id="nit" placeholder="Masukan nit" required value="<?php echo $data['nit']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="golongan">GOLONGAN</label>
                                  <input type="text" name="golongan" class="form-control" id="golongan" placeholder="Masukan Golongan" required value="<?php echo $data['golongan']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="sprin_tks">SPRINT TKS</label>
                                  <input type="text" name="sprin_tks" class="form-control" id="sprin_tks" placeholder="Masukan Sprint TKS" required value="<?php echo $data['sprin_tks']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>TANGGAL SPRINT</label>
                                  <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                                    <input type="text" name="tanggal_sprin" class="form-control datetimepicker-input" data-target="#reservationdate12" value="<?php echo $data['tanggal_sprin']; ?>" required />
                                    <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>TMT TKS</label>
                                  <div class="input-group date" id="reservationdate13" data-target-input="nearest">
                                    <input type="text" name="tmt_tks" class="form-control datetimepicker-input" data-target="#reservationdate13" value="<?php echo $data['tmt_tks']; ?>" required />
                                    <div class="input-group-append" data-target="#reservationdate13" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="penugasan">PENUGASAN</label>
                                  <input type="text" name="penugasan" class="form-control" id="penugasan" placeholder="Masukan Penugasan" required value="<?php echo $data['penugasan']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>KUALIFIKASI</label>
                                  <select class="form-control select2bs4" style="width: 100%;" name="kualifikasi" required>
                                    <option selected="selected" value="<?php echo $data['kualifikasi']; ?>" disabled><?php echo $data['kualifikasi']; ?></option>
                                    <option value="MEDIS">MEDIS</option>
                                    <option value="PARAMEDIS">PARAMEDIS</option>
                                    <option value="NON-MEDIS">NON-MEDIS</option>
                                    <option value="NAKES LAINNYA">NAKES LAINNYA</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>GOLONGAN DARAH</label>
                                  <select class="form-control select2bs4" style="width: 100%;" name="golongan_darah" required>
                                    <option selected="selected" value="<?php echo $data['golongan_darah']; ?>" disabled><?php echo $data['golongan_darah']; ?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="">
                              <button type="submit" class="btn btn-primary" name="btn_tks_update">Kirim</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- Delete Data Modal -->
                    <div class="modal fade" id="DeleteModal<?= $data['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Ingin Menghapus :  </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST">
                            <div class="modal-body">
                                <h3 class="text-center"><strong><?= $data['nama']; ?></strong></h3>
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn_tks_delete" class="btn btn-primary">Hapus</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <!-- End Delete Data Modal -->
                  <tr>
                    <td></td>
                    <td class='d-flex'>
                      <button data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Pegawai" class='btn btn-sm btn-warning' data-toggle="modal" data-target="#editModal<?= $data['id'] ?>"><span><i class="fas fa-edit"></i></span></button>
                      <button data-toggle="modal" data-target="#DeleteModal<?= $data['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Pegawai" class='btn btn-sm btn-danger ml-2'><span><i class="fas fa-trash-alt"></i></span></button>
                    </td>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nit'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tanggal_lahir'] ?></td>
                    <td><?= $data['tempat_lahir'] ?></td>
                    <td><?= $data['agama'] ?></td>
                    <td><?= $data['golongan'] ?></td>
                    <td><?= $data['sprin_tks'] ?></td>
                    <td><?= $data['tmt_tks'] ?></td>
                    <td><?= $data['tanggal_sprin'] ?></td>
                    <td><?= $data['pendidikan_umum'] ?></td>
                    <td><?= $data['tahun_lulus'] ?></td>
                    <td><?= $data['status_perkawinan'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['kualifikasi'] ?></td>
                    <td><?= $data['golongan_darah'] ?></td>
                    <td><?= $data['penugasan'] ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->



<?php
include_once('../includes/footer.php');
?>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [ "csv", "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

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
</script>

<!-- daterangepicker -->
<script src="<?= BASE_URL ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>

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
if (isset($_SESSION['sukses_update'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'success',
      title: 'Data Anda sudah terupdate, Terimakasih.'
    })
  </script>
<?php unset($_SESSION['sukses_update']);
} ?>

<?php
if (isset($_SESSION['gagal_update'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: 'Data Anda gagal terupdate!'
    })
  </script>
<?php unset($_SESSION['gagal_update']);
} ?>


<?php
if (isset($_SESSION['sukses_delete'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'success',
      title: 'Data Anda sudah terdelete, Terimakasih.'
    })
  </script>
<?php unset($_SESSION['sukses_delete']);
} ?>

<?php
if (isset($_SESSION['gagal_delete'])) { ?>
  <script type="text/javascript">
    Toast.fire({
      icon: 'error',
      title: 'Data Anda gagal terdelete!'
    })
  </script>
<?php unset($_SESSION['gagal_delete']);
} ?>

