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
            <h1 class="m-0">Alumni SMAN 17 Bandung</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Alumni SMAN 17 Bandung</li>
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
              showError("ID Guru sudah ada.");
            else if($Error == "input")
              showError("Kesalahan format masukan : \n".$_SESSION["salahinputguru"]);
        }
      ?>      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Alumni SMAN 17 Bandung</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                      <th>No.</th>    
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Kelulusan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jurusan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Alamat</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">No.Telp</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Pendidikan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Pekerjaan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Universitas</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jenjang</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Fakultas</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jurusan</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Saran</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>  
                      <?php 
                        $db = dbConnect();
                        $no = 0;
                        if($db->connect_errno==0)
                        {
                            $sql = "SELECT * FROM alumni";
                            $res = $db->query($sql);
                            if($res)
                            {
                                $data = $res->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row)
                                {
                                    echo "<tr>
                                          <td class='dtr-control sorting_1' tabindex='0'>".(++$no)."</td>
                                          <td>".$row['namaLengkap']."</td>
                                          <td>".$row['tahunLulus']."</td>
                                          <td>".$row['jurusansma']."</td>
                                          <td>".$row['email']."</td>
                                          <td>".$row['alamatRumah']."</td>
                                          <td>".$row['noTelpAlumni']."</td>
                                          <td>".$row['pendidikanTerakhir']."</td>
                                          <td>".$row['pekerjaanAlumni']."</td>
                                          <td>".$row['universitasAlumni']."</td>
                                          <td>".$row['jenjang']."</td>
                                          <td>".$row['fakultas']."</td>
                                          <td>".$row['jurusan']."</td>
                                          <td>".$row['saranAlumni']."</td>
                                          <td>
                                            <a href='admin-alumni-form-hapus.php?idAlumni=".$row['idAlumni']."' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
                                          </td>
                                    </tr>";
                                }
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