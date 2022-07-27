<?php 
session_start();
if(!isset($_SESSION["idAdmin"]))
{
    header("Location: ../login.php?error=4");
}
include_once("functions.php");
include_once("layout.php");

$idKalender = $_GET['idKalender'];
?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Edit Kalender</h1>
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

        if (isset($_POST['btnUpdate'])) {
            $db = dbConnect();
            $judulKalender = $_POST['judulKalender'];
            $tanggalKalender = $_POST['tanggalKalender'];

            $sqlUpdateKalender = "UPDATE kalender SET namaKalender = '$judulKalender', tanggalKalender = '$tanggalKalender' WHERE idKalender = '$idKalender'";
            $executeUpdateKalender = $db->query($sqlUpdateKalender);

            if ($executeUpdateKalender) {
                echo "
                    <script>
                        document.location.href = 'admin-kalenderakademik.php?success=1';
                    </script>
                ";

            }else{
                echo "
                    <script>
                        document.location.href = 'admin-kalenderakademik.php?error=proses';
                    </script>
                ";
            }

        }

      ?>
      

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kalender</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idKalender"]))
                {
                    $db = dbConnect();
                    $idKalender = $_GET["idKalender"];
                    $sqlKalender = "SELECT * FROM kalender WHERE idKalender = '$idKalender'";
                    $executeKalender = mysqli_query($db, $sqlKalender);
                    
                    if (!mysqli_num_rows($executeKalender)) {
                        echo "
                            <script>
                                alert('Data tidak ditemukan');
                                document.location.href = 'admin-kalenderakademik.php';
                            </script>
                        ";  
                    }
                    $assocKalender = mysqli_fetch_assoc($executeKalender);
                }
              ?>
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="idBeritaEksternal">ID Kalender</label>
                    <input type="text" class="form-control" id="idBeritaEksternal" maxlength="8" name="idKalender" value="<?php echo $assocKalender["idKalender"] ?>" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="namaBeritaEksternal">Judul Kalender</label>
                    <input type="text" class="form-control" id="namaBeritaEksternal" maxlength="50" name="judulKalender" value="<?php echo $assocKalender["namaKalender"] ?>" placeholder="Masukan Judul Kalender" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input value="<?= $assocKalender['tanggalKalender']?>" class="form-control" type="date" name="tanggalKalender">
                </div>
                <button type="submit" class="btn btn-info" name="btnUpdate" onclick="return confirm('Avakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i> Update</button>
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