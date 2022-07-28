<?php 
session_start();
if(!isset($_SESSION["idAdmin"]))
{
    header("Location: ../login.php?error=4");
}
include_once("functions.php");
include_once("layout.php");
?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Konfirmasi Hapus Alumni</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Alumni</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Alumni</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idAlumni"]))
                {
                    $idAlumni = $_GET["idAlumni"];
                    $dataguru = getDataAlumni($idAlumni);
                }
              ?>
              <div class="card-body">
                <form action="admin-alumni-hapus.php" method="post">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="idAlumni">ID Guru</label>
                        <input type="text" class="form-control" id="idAlumni" maxlength="8" name="idAlumni" placeholder="Masukan ID Alumni" autocomplete="off" value="<?php echo $dataguru["idAlumni"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="namaLengkap">Nama Alumni</label>
                        <input type="text" class="form-control" id="namaLengkap" maxlength="50" name="namaLengkap" placeholder="Masukan Nama Guru" autocomplete="off" value="<?php echo $dataguru["namaLengkap"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="tahunLulus">Tahun Lulus</label>
                        <input type="text" class="form-control" id="tahunLulus" maxlength="13" name="tahunLulus" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["tahunLulus"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="jurusansma">Jurusan SMA</label>
                        <input type="text" class="form-control" id="jurusansma" maxlength="13" name="jurusansma" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["jurusansma"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" maxlength="13" name="email" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["email"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="noTelpAlumni">Nomor Telepon</label>
                        <input type="text" class="form-control" id="noTelpAlumni" maxlength="8" name="noTelpAlumni" placeholder="Masukan ID Alumni" autocomplete="off" value="<?php echo $dataguru["noTelpAlumni"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" name="alamatRumah" placeholder="Masukan alamatRumah" readonly><?php echo $dataguru["alamatRumah"] ?></textarea>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="pendidikanTerakhir" maxlength="50" name="pendidikanTerakhir" placeholder="Masukan Nama Guru" autocomplete="off" value="<?php echo $dataguru["pendidikanTerakhir"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="pekerjaanAlumni">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaanAlumni" maxlength="13" name="pekerjaanAlumni" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["pekerjaanAlumni"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="universitasAlumni">Universitas</label>
                        <input type="text" class="form-control" id="universitasAlumni" maxlength="13" name="universitasAlumni" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["universitasAlumni"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="jenjang">Jenjang</label>
                        <input type="text" class="form-control" id="jenjang" maxlength="13" name="jenjang" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["jenjang"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" maxlength="13" name="fakultas" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["fakultas"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" maxlength="13" name="jurusan" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["jurusan"] ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="saranAlumni">Saran</label>
                        <input type="text" class="form-control" id="saranAlumni" maxlength="13" name="saranAlumni" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["saranAlumni"] ?>" readonly>
                      </div>
                    </div>
                    <!-- col -->
                  </div>
                    <button type="submit" class="btn btn-danger" name="btnHapus" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php bottom_section() ?>
<?php script_section() ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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