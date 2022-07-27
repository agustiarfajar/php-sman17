<?php 
session_start();
if(!isset($_SESSION["idAdmin"]))
{
    header("Location: ../login.php?error=4");
}
include_once("functions.php");
include_once("layout.php");

$rand_angka = random_int(3, '1000');
$idKalenderRand = "KL".$rand_angka;
if (isset($_POST['btnSimpan'])) {
  $db = dbConnect();
  $idKalender = $_POST['idKalender'];
  $namaKalender = $_POST['judulKalender'];
  $tanggal = $_POST['tanggal'];
  $idAdmin = $_SESSION['idAdmin'];


  $sqlInsert = "INSERT INTO kalender (idkalender, namaKalender, tanggalKalender, idAdmin) VALUES ('$idKalender', '$namaKalender', '$tanggal', '$idAdmin')";
  $execute = $db->query($sqlInsert);

  if ($execute) {
    header('Location:admin-kalenderakademik.php?success=1');
  }else{
    header('Location:admin-kalenderakademik.php?error=proses');
  }

}



?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kalender</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Kalender</li>
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
            else if($success == 2)
              showSuccess("Data berhasil diubah.");
            else if($success == 3)
              showSuccess("Data berhasil dihapus.");
            else if($Error == "proses")
              showError("Terjadi kesalahan, silahkan melakukan proses dengan benar");
        }

        if(isset($_GET["error"]))
        {
            $Error = $_GET["error"];
            if($Error == "id")
              showError("ID Kaldender sudah ada.");
            else if($Error == "input")
              showError("Kesalahan format masukan : \n".$_SESSION["salahinputberitaeksternal"]);
            else if($Error == "proses")
              showError("Terjadi kesalahan, silahkan melakukan proses dengan benar");
        }
      ?>
      <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-lg">
        <i class="fas fa-plus"></i> Tambah
      </button>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
        <form action="" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Kalender</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
              <div class="card-body">
                <div class="form-group">
                  <label for="idBeritaEksternal">ID Kalender</label>
                  <input type="text" class="form-control" id="idBeritaEksternal" maxlength="8" name="idKalender" value="<?= $idKalenderRand;?>" readonly autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="namaBeritaEksternal">Judul Kalender</label>
                  <input type="text" class="form-control" id="namaBeritaEksternal" maxlength="50" name="judulKalender" placeholder="Masukan Judul Kalender" autocomplete="off" required>
                </div>
                <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kalender</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Judul</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Modified By</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                    </thead>
                    
                    <?php
                        $db = dbConnect();
                        $no = 1;
                        $sql = "SELECT a.*,b.namaAdmin FROM kalender as a INNER JOIN administrator as b ON a.idAdmin = b.idAdmin";
                        $exec = mysqli_query($db, $sql);
                    ?>
                    
                    <tbody>
                        <?php foreach($exec as $resKalender):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $resKalender['idKalender']?></td>
                            <td><?= $resKalender['namaKalender']?></td>
                            <td><?= $resKalender['tanggalKalender']?></td>
                            <td><?= $resKalender['namaAdmin']?></td>
                            <td>
                              <a href="admin-kalender-form-edit.php?idKalender=<?= $resKalender['idKalender']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> |
                              <a href="admin-kalender-hapus.php?idKalender=<?=$resKalender['idKalender']?>" onclick="return confirm('Yakin anda hapus data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>              
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
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