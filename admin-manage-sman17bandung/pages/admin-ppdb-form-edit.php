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
            <h1 class="m-0">Form Edit PPDB</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="admin-beritaeksternal.php">PPDB</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title">PPDB</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idppdb"]))
                {
                    $idppdb = $_GET["idppdb"];
                    $Datappdb = getDataPPDB($idppdb);
                }
              ?>
              <form action="admin-ppdb-update.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  <label for="idppdb">Id PPDB</label>
                  <input type="text" class="form-control" id="idppdb" maxlength="4" name="idppdb" value="<?php echo $Datappdb["idppdb"] ?>" readonly autocomplete="off" required>
                </div>
                <div class="form-group">
                <label for="summernote">Isi</label>
                <textarea id="summernote" name="isippdb" rows="3" required><?php echo $Datappdb["isippdb"] ?></textarea>                          
                </div>
                <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" maxlength="4" class="form-control" value="<?php echo $Datappdb["tahun"] ?>" required>
              </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="gambarLama" value="<?php echo $Datappdb["foto"] ?>">
                        <input type="file" name="file" class="form-control" id="exampleInputFile" value="<?php echo $Datappdb["foto"] ?>">
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><?php echo $Datappdb["foto"] ?></span>
                      </div>
                    </div>
                    <img src="file/ppdb/<?php echo $Datappdb["foto"] ?>" width="100px">
                  </div>
                  <div class="form-group">
                  <label for="namafoto">Nama Foto</label>
                  <input type="text" class="form-control" id="namafoto" maxlength="200" name="namafoto" value="<?php echo $Datappdb["namaFoto"] ?>">
                </div>
                <div class="form-group">
                <label for="tanggalUpload">Tanggal Upload</label>
                <input type="date" id="tanggalUpload" name="tanggalUpload" class="form-control" value="<?php echo $Datappdb["tanggalUpload"] ?>" required>
                </div>
                <div class="form-group">
                <label for="waktuUpload">Waktu Upload</label>
                <input type="time" id="waktuUpload" name="waktuUpload" class="form-control" value="<?php echo $Datappdb["waktuUpload"] ?>" required>
                </div>
                  <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i> Update</button>
                  <button type="reset" class="btn btn-primary">Reset</button>
                </div>
                <!-- /.card-body -->
              </form>
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