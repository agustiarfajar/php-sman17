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
            <h1 class="m-0">Form Edit Berita Eksternal</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="admin-beritaeksternal.php">Berita Eksternal</a></li>
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
                <h3 class="card-title">Berita Eksternal</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idBeritaEksternal"]))
                {
                    $idBeritaEksternal = $_GET["idBeritaEksternal"];
                    $DataBeritaEksternal = getDataBeritaEksternal($idBeritaEksternal);
                }
              ?>
              <form action="admin-beritaeksternal-update.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="idBeritaEksternal">ID Berita Eksternal</label>
                    <input type="text" class="form-control" id="idBeritaEksternal" maxlength="8" name="idBeritaEksternal" value="<?php echo $DataBeritaEksternal["idBeritaEksternal"] ?>" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="namaBeritaEksternal">Nama Berita Eksternal</label>
                    <input type="text" class="form-control" id="namaBeritaEksternal" maxlength="50" name="namaBeritaEksternal" value="<?php echo $DataBeritaEksternal["namaBeritaEksternal"] ?>" placeholder="Masukan Berita Eksternal" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                  <label for="summernote">Isi</label>
                  <textarea id="summernote" name="isiBeritaEksternal" rows="3" required><?php echo $DataBeritaEksternal["isiBeritaEksternal"] ?></textarea>                          
                  </div>
                  <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="datetime-local" id="tanggal" name="tanggal" class="form-control" value="<?php echo $DataBeritaEksternal["tanggal"] ?>" required>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Berita</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="gambarLama" value="<?php echo $DataBeritaEksternal["fotoBerita"] ?>">
                        <input type="file" name="file" class="form-control" id="exampleInputFile" value="<?php echo $DataBeritaEksternal["fotoBerita"] ?>">
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><?php echo $DataBeritaEksternal["fotoBerita"] ?></span>
                      </div>
                    </div>
                    <img src="file/berita_eksternal/<?php echo $DataBeritaEksternal["fotoBerita"] ?>" width="100px">
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