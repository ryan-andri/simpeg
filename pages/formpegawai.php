<?php
require_once('../configs/default.php');
include_once('../includes/header.php');
?>

<div class="hold-transition">
  <div class="row justify-content-center mt-3">
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">FORM KEPEGAWAIAN</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
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
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="tmt_tni" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
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
                  <label for="pangkat">PANGKAT</label>
                  <input type="text" name="pangkat" class="form-control" id="pangkat" placeholder="Masukan Pangkat">
                </div>
                <div class="form-group">
                  <label for="corps">CORPS</label>
                  <input type="text" name="corps" class="form-control" id="corps" placeholder="Masukan Corps Satuan">
                </div>
                <div class="form-group">
                  <label>TMT CORPS</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="tmt_corps" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nrp">NRP</label>
                  <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Masukan NRP">
                </div>
                <div class="form-group">
                  <label for="jabatan">JABATAN</label>
                  <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan">
                </div>
                <div class="form-group">
                  <label>TMT JABATAN</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="tmt_jabatan" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
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

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
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
</script>