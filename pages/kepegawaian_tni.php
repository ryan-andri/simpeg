<?php
session_start();
require_once('../configs/default.php');
include_once('../includes/header.php');
include_once('../includes/sidebar.php');

// db
$db = dbInstance();

// Function Tambah Data
function PostData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  // db
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $db->getOne($table);
  if ($db->count > 0) {
    $_SESSION['data_exist'] = 1;
  } else {
    $res = $db->insert($table, $input);
    if ($res)
      $_SESSION['sukses_simpan'] = 1;
    else
      $_SESSION['gagal_simpan'] = 1;
  }
}

// Function Edit Data
function EditData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  // db
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $data = $db->update($table, $input);
  if ($data) {
    $_SESSION['sukses_update'] = 1;
  } else {
    $_SESSION['gagal_update'] = 1;
  }
}

// Delete Data
function DeleteData($table, $key)
{
  $input = filter_input_array(INPUT_POST);
  array_splice($input, count($input) - 1, 1);
  // db
  $db = dbInstance();
  $db->where($key, $input[$key]);
  $data = $db->delete($table);
  if ($data) {
    $_SESSION['sukses_delete'] = 1;
  } else {
    $_SESSION['gagal_delete'] = 1;
  }
}

// functional button kirim
if (isset($_POST['btn_tni'])) {
  PostData("militer", "nrp");
}
if (isset($_POST['btn_tni_update'])) {
  EditData("militer", "id");
}
if (isset($_POST['btn_tni_delete'])) {
  DeleteData("militer", "id");
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Halaman Kepegawaian-TNI</h1>
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
              <h4 class="mt-2">Data Pegawai TNI</h4>
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
                              <select class="form-control select2bs4" name="jenis_kelamin" style="width: 100%;" required>
                                <option selected="selected" disabled>JENIS KELAMIN</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="pangkat">PANGKAT</label>
                              <select class="form-control select2bs4" name="pangkat" style="width: 100%;" required>
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
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="btn_tni">Simpan</button>
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
                    <th>NRP</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TEMPAT LAHIR</th>
                    <th>AGAMA</th>
                    <th>STATUS PERKAWINAN</th>
                    <th>PANGKAT</th>
                    <th>CORPS</th>
                    <th>PENDIDIKAN UMUM</th>
                    <th>PENDIDIKAN MILITER</th>
                    <th>TMT TNI</th>
                    <th>TMT CORPS</th>
                    <th>JABATAN</th>
                    <th>TMT JABATAN</th>
                    <th>GOLONGAN DARAH</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $db = $db->get('militer');
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
                            <form method="POST">
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
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                      <input type="text" name="tanggal_lahir" class="form-control datetimepicker-input" data-date-format="YYYY-MM-DD" value="<?php echo $data['tanggal_lahir']; ?>" data-target="#reservationdate" required />
                                      <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>AGAMA</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                                      <option selected="selected" value="<?php echo $data['agama']; ?>" disabled><?php echo $data['agama']; ?></option>
                                      <option value="ISLAM">ISLAM</option>
                                      <option value="KRISTEN">KRISTEN</option>
                                      <option value="BUDHA">BUDHA</option>
                                      <option value="HINDU">HINDU</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="pendidikan_umum">PENDIDIKAN UMUM</label>
                                    <input type="text" name="pendidikan_umum" class="form-control" id="pendidikan_umum" placeholder="Masukan Pendidikan Umum" required value="<?php echo $data['pendidikan_umum']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="pendidikan_militer">PENDIDIKAN MILITER</label>
                                    <input type="text" name="pendidikan_militer" class="form-control" id="pendidikan_militer" placeholder="Masukan Pendidikan Militer" required value="<?php echo $data['pendidikan_militer']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TMT TNI</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                      <input type="text" name="tmt_tni" class="form-control datetimepicker-input" data-target="#reservationdate2" value="<?php echo $data['tmt_tni']; ?>" required />
                                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>STATUS PERNIKAHAN</label>
                                    <select class="form-control select2bs4" name="status_perkawinan" style="width: 100%;" required>
                                      <option selected="selected" value="<?php echo $data['status_perkawinan']; ?>" disabled><?php echo $data['status_perkawinan']; ?></option>
                                      <option value="MENIKAH">MENIKAH</option>
                                      <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nrp">NRP</label>
                                    <input type="number" name="nrp" class="form-control" id="nrp" placeholder="Masukan NRP" required value="<?php echo $data['nrp']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>JENIS KELAMIN</label>
                                    <select class="form-control select2bs4" name="jenis_kelamin" style="width: 100%;" required>
                                      <option selected="selected" value="<?php echo $data['jenis_kelamin']; ?>" disabled><?php echo $data['jenis_kelamin']; ?></option>
                                      <option value="laki-laki">LAKI-LAKI</option>
                                      <option value="perempuan">PEREMPUAN</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="pangkat">PANGKAT</label>
                                    <select class="form-control select2bs4" name="pangkat" style="width: 100%;" required>
                                      <option selected="selected" disabled value="<?php echo $data['pangkat']; ?>"><?php echo $data['pangkat']; ?></option>
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
                                    <input type="text" name="corps" class="form-control" id="corps" placeholder="Masukan Corps Satuan" required value="<?php echo $data['corps']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TMT CORPS</label>
                                    <div class="input-group date" id="reservationdate3" data-target-input="nearest" required>
                                      <input type="text" name="tmt_corps" class="form-control datetimepicker-input" data-target="#reservationdate3" value="<?php echo $data['tmt_corps']; ?>" />
                                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="jabatan">JABATAN</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan" required value="<?php echo $data['jabatan']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>TMT JABATAN</label>
                                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                      <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate4" required value="<?php echo $data['tmt_jabatan']; ?>" />
                                      <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>GOLONGAN DARAH</label>
                                    <select class="form-control select2bs4" name="gol_darah" style="width: 100%;" required>
                                      <option selected="selected" disabled value="<?php echo $data['gol_darah']; ?>"><?php echo $data['gol_darah']; ?></option>
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="O">O</option>
                                      <option value="AB">AB</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn_tni_update">Simpan</button>
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
                            <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Ingin Menghapus : </h5>
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
                              <button type="submit" name="btn_tni_delete" class="btn btn-primary">Hapus</button>
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
                      <td><?= $data['nrp'] ?></td>
                      <td><?= $data['nama'] ?></td>
                      <td><?= $data['tanggal_lahir'] ?></td>
                      <td><?= $data['tempat_lahir'] ?></td>
                      <td><?= $data['agama'] ?></td>
                      <td><?= $data['status_perkawinan'] ?></td>
                      <td><?= $data['pangkat'] ?></td>
                      <td><?= $data['corps'] ?></td>
                      <td><?= $data['pendidikan_umum'] ?></td>
                      <td><?= $data['pendidikan_militer'] ?></td>
                      <td><?= $data['tmt_tni'] ?></td>
                      <td><?= $data['tmt_corps'] ?></td>
                      <td><?= $data['jabatan'] ?></td>
                      <td><?= $data['tmt_jabatan'] ?></td>
                      <td><?= $data['gol_darah'] ?></td>
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
      "buttons": ["csv", "excel", "pdf"]
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