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
            <h1 class="m-0">Konfirmasi Hapus Berita Eksternal</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="admin-beritaeksternal.php">Berita Eksternal</a></li>
              <li class="breadcrumb-item active">Hapus</li>
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
              <form action="admin-beritaeksternal-hapus.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="form-group">
                    <label for="idBeritaEksternal">ID Berita Eksternal</label>
                    <input type="text" class="form-control" id="idBeritaEksternal" maxlength="8" name="idBeritaEksternal" value="<?php echo $DataBeritaEksternal["idBeritaEksternal"] ?>" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="namaBeritaEksternal">Nama Berita Eksternal</label>
                    <input type="text" class="form-control" id="namaBeritaEksternal" maxlength="50" name="namaBeritaEksternal" value="<?php echo $DataBeritaEksternal["namaBeritaEksternal"] ?>" autocomplete="off" readonly>
                  </div>
                  <div class="form-group">
                  <label for="isi">Isi Berita Eksternal</label>
                  <textarea id="isi" name="isiBeritaEksternal" class="form-control" rows="3" readonly><?php echo $DataBeritaEksternal["isiBeritaEksternal"] ?></textarea>                          
                  </div>
                  <div class="form-group">
                  <label>Tanggal</label>
                  <input type="text" class="form-control" name="tanggal" value="<?php echo $DataBeritaEksternal["tanggal"] ?>" readonly>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Berita</label><br>
                    <img src="file/berita_eksternal/<?php echo $DataBeritaEksternal["fotoBerita"] ?>" width="100px">    
                  </div>
                  <button type="submit" class="btn btn-danger" name="btnHapus" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</button>
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