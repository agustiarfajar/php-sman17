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
            <h1 class="m-0">PPDB</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">PPDB</li>
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
              showError("ID PPDB sudah ada.");
            else if($Error == "proses")
              showError("Terjadi kesalahan, silahkan melakukan proses dengan benar");
        }
      ?>
      <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-lg">
        <i class="fas fa-plus"></i> Tambah
      </button>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
        <form action="admin-ppdb-simpan.php" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data PPDB</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
              <div class="card-body">
                <div class="form-group">
                  <label for="idppdb">Id PPDB</label>
                  <input type="text" class="form-control" id="idppdb" maxlength="8" name="idppdb" value="<?php echo kodeOtomatisPPDB() ?>" readonly autocomplete="off" required>
                </div>
                <div class="form-group">
                <label for="summernote">Isi</label>
                <textarea id="summernote" name="isippdb" rows="3" required></textarea>                          
                </div>
                <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" maxlength="4" class="form-control" required>
              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" accept=".jpg,.png" class="form-control" id="exampleInputFile">
                    </div>
                  </div>
                  <div><small class="form-text">Format: jpg, png</small></div>
                </div>
                <div class="form-group">
                  <label for="namafoto">Nama Foto</label>
                  <input type="text" class="form-control" id="namafoto" maxlength="50" name="namafoto">
                </div>
                <div class="form-group">
                <label for="tanggalUpload">Tanggal Upload</label>
                <input type="date" id="tanggalUpload" name="tanggalUpload" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="waktuUpload">Waktu Upload</label>
                <input type="time" id="waktuUpload" name="waktuUpload" class="form-control" required>
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
                <h3 class="card-title">PPDB</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Isi</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tahun</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Foto PPDB</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Foto</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal Upload</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Waktu Upload</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>  
                      <?php 
                        $db = dbConnect();
                        $no = 0;
                        if($db->connect_errno==0)
                        {
                            $sql = "SELECT * 
                                    FROM ppdb ";
                            $res = $db->query($sql);
                            if($res)
                            {
                                $data = $res->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row)
                                {
                                    echo "<tr>
                                          <td class='dtr-control sorting_1' tabindex='0'>".(++$no)."</td>
                                          <td>".$row['idppdb']."</td>
                                          <td>".$row['isippdb']."</td>
                                          <td>".$row['tahun']."</td>
                                          <td><img src='file/ppdb/".$row['foto']."' width='100px'></td>
                                          <td>".$row['namaFoto']."</td>
                                          <td>".date('d M Y', strtotime($row['tanggalUpload']))."</td>
                                          <td>".date('H:i:s', strtotime($row['waktuUpload']))."</td>
                                          <td>
                                            <a href='admin-ppdb-form-edit.php?idppdb=".$row['idppdb']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a> |
                                            <a href='admin-ppdb-form-hapus.php?idppdb=".$row['idppdb']."' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i>
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