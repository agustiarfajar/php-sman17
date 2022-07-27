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
            <h1 class="m-0">Berita Internal</h1>
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
            else if($success == 2)
              showSuccess("Data berhasil diubah.");
            else if($success == 3)
              showSuccess("Data berhasil dihapus.");
        }

        if(isset($_GET["error"]))
        {
            $Error = $_GET["error"];
            if($Error == "id")
              showError("ID Berita sudah ada.");
            else if($Error == "input")
              showError("Kesalahan format masukan : \n".$_SESSION["salahinputberitainternal"]);
            else if($Error == "proses")
              showError("Terjadi kesalahan, silahkan melakukan proses dengan benar");
        }
      ?>
      <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-lg">
        <i class="fas fa-plus"></i> Tambah
      </button>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
        <form action="admin-beritainternal-simpan.php" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Berita Internal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
              <div class="card-body">
                <div class="form-group">
                  <label for="idBeritaInternal">ID Berita Internal</label>
                  <input type="text" class="form-control" id="idBeritaInternal" maxlength="8" name="idBeritaInternal" value="<?php echo kodeOtomatisBeritaInternal() ?>" readonly autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="namaBeritaInternal">Nama Berita Internal</label>
                  <input type="text" class="form-control" id="namaBeritaInternal" maxlength="50" name="namaBeritaInternal" placeholder="Masukan Berita Internal" autocomplete="off" required>
                </div>
                <div class="form-group">
                <label for="summernote">Isi</label>
                <textarea id="summernote" name="isiBeritaInternal" rows="3"></textarea>                          
                </div>
                <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="datetime-local" id="tanggal" name="tanggal" class="form-control">
              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto Berita</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" accept=".jpg,.png" class="form-control" id="exampleInputFile" required>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
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
                <h3 class="card-title">Berita Internal</h3>
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
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Isi</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Foto Berita</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Modified By</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>  
                      <?php 
                        $db = dbConnect();
                        $no = 0;
                        if($db->connect_errno==0)
                        {
                            $sql = "SELECT a.*,b.namaAdmin 
                                    FROM berita_internal as a INNER JOIN administrator as b ON a.idAdmin = b.idAdmin";
                            $res = $db->query($sql);
                            if($res)
                            {
                                $data = $res->fetch_all(MYSQLI_ASSOC);
                                foreach($data as $row)
                                {
                                    echo "<tr>
                                          <td class='dtr-control sorting_1' tabindex='0'>".(++$no)."</td>
                                          <td>".$row['idBeritaInternal']."</td>
                                          <td>".$row['namaBeritaInternal']."</td>
                                          <td>".$row['isiBeritaInternal']."</td>
                                          <td>".date('d M Y H:i', strtotime($row['tanggal']))."</td>
                                          <td><img src='file/berita_internal/".$row['fotoBerita']."' width='100px'></td>
                                          <td>".$row['namaAdmin']."</td>
                                          <td>
                                            <a href='admin-beritainternal-form-edit.php?idBeritaInternal=".$row['idBeritaInternal']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a> |
                                            <a href='admin-beritainternal-form-hapus.php?idBeritaInternal=".$row['idBeritaInternal']."' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
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