<?php 
session_start();
if(!isset($_SESSION["idAdmin"]))
{
    header("Location: ../login.php?error=4");
}
include_once("functions.php");
include_once("layout.php");
$db = dbConnect();
$idjadwal = $_GET['idjadwal'];
?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Edit Jadwal</h1>
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
            $namaJadwal = $_POST['namaJadwal'];
            $kelas = $_POST['kelas'];
            $idGuru = $_POST['guru'];

            $sqlUpdateJadwal = "UPDATE jadwal SET namaJadwal = '$namaJadwal', kelas = '$kelas', idGuru = '$idGuru' WHERE idJadwal = '$idjadwal'";
            $executeUpdateJadwal = $db->query($sqlUpdateJadwal);

            if ($executeUpdateJadwal) {
                echo "
                    <script>
                        document.location.href = 'admin-jadwal.php?success=1';
                    </script>
                ";

            }else{
                echo "
                    <script>
                        document.location.href = 'admin-jadwal.php?error=proses';
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
                <h3 class="card-title">Jadwal</h3>
              </div>
              <!-- /.card-header -->
              <?php 
                if(isset($_GET["idjadwal"]))
                {
                    $db = dbConnect();
                    $idjadwal = $_GET["idjadwal"];
                    $sqlJadwal = "SELECT * FROM jadwal WHERE idJadwal = '$idjadwal'";
                    $executejadwal = mysqli_query($db, $sqlJadwal);
                    
                    if (!mysqli_num_rows($executejadwal)) {
                        echo "
                            <script>
                                alert('Data tidak ditemukan');
                                document.location.href = 'admin-jadwal.php';
                            </script>
                        ";  
                    }
                    $assocJadwal = mysqli_fetch_assoc($executejadwal);
                }else{
                  echo "
                      <script>
                          alert('Data tidak ditemukan');
                          document.location.href = 'admin-jadwal.php';
                      </script>
                  ";
                }
              ?>
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="idBeritaEksternal">ID Jadwal</label>
                    <input type="text" class="form-control" id="idBeritaEksternal" maxlength="8" name="idjadwal" value="<?php echo $assocJadwal["idJadwal"] ?>" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="namaBeritaEksternal">Nama Jadwal</label>
                    <input type="text" class="form-control" id="namaBeritaEksternal" maxlength="50" name="namaJadwal" value="<?php echo $assocJadwal["namaJadwal"] ?>" placeholder="Masukan Judul Kalender" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Kelas</label>
                    <input value="<?= $assocJadwal['kelas']?>" class="form-control" type="text" name="kelas">
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Guru</label>
                    <?php
                      $pwo = $assocJadwal['idGuru'];
                      
                      $sqlFindGuru = "SELECT * FROM guru WHERE idGuru = '$pwo'";
                      $executeFindGuruById = $db->query($sqlFindGuru);

                      $sqlGuru = "SELECT * FROM guru";
                      $executeGuru = $db->query($sqlGuru);


                      $assocGuru = $executeFindGuruById->fetch_assoc();
                    ?>
                    <select name="guru" class="form-control">
                      
                      <option class="form-group" value="<?= $assocGuru['idGuru']?>"><?= $assocGuru['namaGuru']?></option>

                      <?php foreach ($executeGuru as $resGuru): ?>
                          <option class="form-group" value="<?= $resGuru['idGuru']?>"><?= $resGuru['namaGuru']?></option>
                      <?php endforeach ?>
                      

                    </select>

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