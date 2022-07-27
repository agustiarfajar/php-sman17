<?php 
session_start();
if(!isset($_SESSION["idAdmin"]))
{
    header("Location: ../login.php?error=4");
}
include_once("functions.php");

$db = dbConnect();

$idKalenderRand = random_int(3, 1000);

  	if (isset($_POST['btnSimpan'])) {
  		$idJadwal = $_POST['idJadwal'];
  		$namaJadwal = $_POST['namaJadwal'];
  		$kelas = $_POST['kelas'];
  		$guru = $_POST['guru'];
  		$idAdmin = $_POST['idAdmin'];


  		$sqlInsertJadwal = "INSERT INTO jadwal VALUES ('$idJadwal', '$namaJadwal', '$kelas', '$guru', '$idAdmin')";
  		$executeJadwal = $db->query($sqlInsertJadwal);

  		if ($executeJadwal) {
		    header('Location:admin-jadwal.php?success=1');
		}else{
			header('Location:admin-jadwal.php?error=proses');
		}

  	}
 	include_once("layout.php");
?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jadwal Pelajaran</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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
        }

        if(isset($_GET["error"]))
        {
            $Error = $_GET["error"];
            if($Error == "id")
              showError("ID Jadwal sudah ada.");
            else if($Error == "input")
              showError("Kesalahan format masukan : \n".$_SESSION["salahinputjadwalpelajaran"]);
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
              <h4 class="modal-title">Tambah Data Jadwal Pelajaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
              <div class="card-body">
                <div class="form-group">
                  <label for="idJadwal">ID Jadwal Pelajaran</label>
                  <input type="text" class="form-control" id="idJadwal" maxlength="8" name="idJadwal" value="<?= "J".$idKalenderRand; ?>" readonly autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="namaJadwal">Nama Jadwal Pelajaran</label>
                  <input type="text" class="form-control" id="namaJadwal" maxlength="30" name="namaJadwal" placeholder="Masukan Nama Jadwal Pelajaran" required>
                </div>
                <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" class="form-control" id="kelas" maxlength="10" name="kelas" placeholder="Masukan Nama Kelas" required>
                </div>
                <div class="form-group">
                <label for="namaGuru">Nama Guru</label>
                <select class="form-control" name="guru">
                	<option value="" required>-Pilih Guru-</option>
                	<?php 
                		$sqlGuru = "SELECT * FROM guru";
                		$executeGuru = $db->query($sqlGuru);
                	?>
                	<?php foreach ($executeGuru as $resGuru):?>
                	<option value="<?= $resGuru['idGuru']?>"><?= $resGuru['namaGuru']?></option>
                	<?php endforeach;?>
                </select>
              </div>
               <div class="form-group">
                <label for="namaGuru">ID Admin</label>
                <input class="form-control" type="text" name="idAdmin" value="<?= $_SESSION['idAdmin'] ?>" placeholder="<?= $_SESSION['idAdmin'] ?>" readonly>
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
                <h3 class="card-title">Jadwal Pelajaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Jadwal Pelajaran</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Kelas</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Guru</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Admin</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                    </tr>
                    </thead>
                    <tbody>  
                      <?php 
                        $db = dbConnect();
                        $no = 0;
                        if($db->connect_errno==0)
                        {
                            $sql = "SELECT a.*, b.namaAdmin, c.namaGuru FROM ((jadwal as a
									INNER JOIN administrator as b ON a.idAdmin = b.idAdmin)
									INNER JOIN guru as c ON a.idGuru = c.idGuru)";
                            $res = $db->query($sql);
                            if($res)
                            {
                                $data = $res->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row):?>
                                
                                    <tr>
                                      <td class='dtr-control sorting_1' tabindex='0'><?= (++$no)?></td>
                                      <td><?= $row['idJadwal']?></td>
                                      <td><?= $row['namaJadwal']?></td>
                                      <td><?= $row['kelas']?></td>
                                      <td><?= $row['namaGuru']?></td>
                                      <td><?= $row['namaAdmin']?></td>
                                      <td>
                                        <a href="admin-jadwal-form-edit.php?idjadwal=<?=$row['idJadwal']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> |
                                        <a href="admin-jadwal-hapus.php?idJadwal=<?=$row['idJadwal']?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                      </td>
                                  </tr>
                                  <?php endforeach; 
                                $res->free();
                            }
                        }
                      ?>
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