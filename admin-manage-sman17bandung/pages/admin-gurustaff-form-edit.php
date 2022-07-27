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
            <h1 class="m-0">Guru dan Staff</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Guru dan Staff</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php 
        if(isset($_GET["success"]))
        {
            $success = $_GET["success"];
            if($success == 1)
              showSuccess("Data berhasil disimpan.");
        }
      ?>
      

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Guru dan Staff</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idGuru"]))
                {
                    $idGuru = $_GET["idGuru"];
                    $dataguru = getDataGuru($idGuru);
                }
              ?>
              <div class="card-body">
                <form action="admin-gurustaff-update.php" method="post">
                  <div class="form-group">
                      <label for="idGuru">ID Guru</label>
                      <input type="text" class="form-control" id="idGuru" maxlength="8" name="idGuru" placeholder="Masukan ID Guru" autocomplete="off" value="<?php echo $dataguru["idGuru"] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="namaGuru">Nama Guru</label>
                      <input type="text" class="form-control" id="namaGuru" maxlength="50" name="namaGuru" placeholder="Masukan Nama Guru" autocomplete="off" value="<?php echo $dataguru["namaGuru"] ?>">
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                      <div class="custom-control custom-radio">    
                        <input class="custom-control-input" type="radio" id="jkl" name="jk" value="L" <?php echo ($dataguru["jk"] == 'L' ? 'checked' : '') ?>>
                        <label for="jkl" class="custom-control-label">Laki-laki</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="jkp" name="jk" value="P" <?php echo ($dataguru["jk"] == 'P' ? 'checked' : '') ?>>
                        <label for="jkp" class="custom-control-label">Perempuan</label>
                      </div>                    
                    </div>
                    <div class="form-group">
                      <label for="noTelp">No.Telp</label>
                      <input type="text" class="form-control" id="noTelp" maxlength="13" name="noTelpGuru" placeholder="Masukan No.Telp" autocomplete="off" value="<?php echo $dataguru["noTelpGuru"] ?>">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamatGuru" placeholder="Masukan Alamat"><?php echo $dataguru["alamatGuru"] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i> Update</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
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