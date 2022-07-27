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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>
                    <?php  
                      $jmlGuru = countGuru();
                      echo $jmlGuru["jmlGuru"];
                    ?>
                    </h3>
                    <p>Guru dan Staff</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="admin-gurustaff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                  <?php  
                    $jmlBeritaInt = countBeritaInt();
                    echo $jmlBeritaInt["jmlBeritaInt"];
                  ?>
                  </h3>
                  <p>Berita Internal</p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="admin-beritainternal.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
          </div>
          
          <div class="row">
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                  <?php  
                    $jmlBeritaEks = countBeritaEks();
                    echo $jmlBeritaEks["jmlBeritaEks"];
                  ?>
                  </h3>
                  <p>Berita Eksternal</p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="admin-beritaeksternal.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <!-- ./col -->
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php  
                      $jmlPPDB = countPPDB();
                      echo $jmlPPDB["jmlppdb"];
                    ?>
                  </h3>
                  <p>PPDB</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar"></i>
                </div>
                <a href="admin-ppdb.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                  <?php  
                    $jadwal = countJadwal();
                    echo $jadwal["jmlJadwal"];
                  ?>
                  </h3>
                  <p>Jadwal Pelajaran</p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="admin-jadwal.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>     
            <!-- ./col -->
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                  <?php  
                    $kalender = countKalender();
                    echo $kalender["jmlKalender"];
                  ?>
                  </h3>
                  <p>Kalender Akademik</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar"></i>
                </div>
                <a href="admin-kalender.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            </div>          
          </div>
          <div class="col-md-6">
            <section class="col-lg-12 connectedSortable">
            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </section>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php bottom_section() ?>
<?php script_section() ?>