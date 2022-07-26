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
            <h1 class="m-0">Form Edit Berita Internal</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Berita Internal</li>
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
                <h3 class="card-title">Berita Internal</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idBeritaInternal"]))
                {
                    $idBeritaInternal = $_GET["idBeritaInternal"];
                    $DataBeritaInternal = getDataBeritaInternal($idBeritaInternal);
                }
              ?>
              <form action="admin-beritainternal-update.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="idBeritaInternal">ID Berita Internal</label>
                    <input type="text" class="form-control" id="idBeritaInternal" maxlength="8" name="idBeritaInternal" value="<?php echo $DataBeritaInternal["idBeritaInternal"] ?>" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="namaBeritaInternal">Nama Berita Internal</label>
                    <input type="text" class="form-control" id="namaBeritaInternal" maxlength="50" name="namaBeritaInternal" value="<?php echo $DataBeritaInternal["namaBeritaInternal"] ?>" placeholder="Masukan Berita Internal" autocomplete="off">
                  </div>
                  <div class="form-group">
                  <label for="summernote">Isi</label>
                  <textarea id="summernote" name="isiBeritaInternal" rows="3"><?php echo $DataBeritaInternal["isiBeritaInternal"] ?></textarea>                          
                  </div>
                  <div class="form-group">
                  <label>Date and time:</label>
                  <input type="datetime-local" name="tanggal" class="form-control" value="<?php echo $DataBeritaInternal["tanggal"] ?>">
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Berita</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="gambarLama" value="<?php echo $DataBeritaInternal["fotoBerita"] ?>">
                        <input type="file" name="file" class="form-control" id="exampleInputFile" value="<?php echo $DataBeritaInternal["fotoBerita"] ?>">
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><?php echo $DataBeritaInternal["fotoBerita"] ?></span>
                      </div>
                    </div>
                    <img src="file/berita_internal/<?php echo $DataBeritaInternal["fotoBerita"] ?>" width="100px">
                  </div>
                  <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i> Update</button>
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