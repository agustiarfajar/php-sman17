<?php 
define("DEVELOPMENT", TRUE);
include_once("layout.php");
function dbConnect()
{
    $db = new mysqli("localhost","root","","sman17");
    return $db;
}

function showSuccess($message)
{   
    // style_section();
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Informasi</h5>
        <?php echo $message ?>
    </div>
<?php
}
function showError($message)
{   
    // style_section();
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation"></i> Informasi</h5>
        <?php echo $message ?>
    </div>
<?php
}

// DASHBOARD
function countGuru()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlGuru FROM guru";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}
function countBeritaInt()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlBeritaInt FROM berita_internal";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}
function countBeritaEks()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlBeritaEks FROM berita_eksternal";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}
function countPPDB()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlppdb FROM ppdb";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}
function countJadwal()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlJadwal FROM jadwal";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}
function countKalender()
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT COUNT(*) as jmlKalender FROM kalender";
        $res = $db->query($sql);
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}

function getDataGuru($idGuru){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM guru WHERE idGuru = '$idGuru'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getDataBeritaInternal($idBeritaInternal){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM berita_internal WHERE idBeritaInternal = '$idBeritaInternal'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getDataBeritaEksternal($idBeritaEksternal){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM berita_eksternal WHERE idBeritaEksternal = '$idBeritaEksternal'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getDataAlumni($idAlumni){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM alumni WHERE idAlumni = '$idAlumni'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}


// PENOMORAN OTOMATIS
function kodeOtomatisGuru()
{
    $db = dbConnect();
	if($db->connect_errno == 0)
    {
        $sql = "SELECT MAX(idGuru) as kodeTerbesar FROM guru";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $idGuru = $data['kodeTerbesar'];
                $urutan = (int) substr($idGuru, 1, 4);
                $urutan++;

                $huruf = "G";
                $idGuru = $huruf.sprintf("%04s", $urutan);
               
            } else 
            {
                $idGuru = "G0001";
            }
        }
        return $idGuru;
    }
    else
        return FALSE;   
}

function kodeOtomatisBeritaInternal()
{
    $db = dbConnect();
	if($db->connect_errno == 0)
    {
        $sql = "SELECT MAX(idBeritaInternal) as kodeTerbesar FROM berita_internal";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $idGuru = $data['kodeTerbesar'];
                $urutan = (int) substr($idGuru, 2, 4);
                $urutan++;

                $huruf = "BI";
                $idGuru = $huruf.sprintf("%04s", $urutan);
               
            } else 
            {
                $idGuru = "BI0001";
            }
        }
        return $idGuru;
    }
    else
        return FALSE;   
}

function kodeOtomatisBeritaEksternal()
{
    $db = dbConnect();
	if($db->connect_errno == 0)
    {
        $sql = "SELECT MAX(idBeritaEksternal) as kodeTerbesar FROM berita_eksternal";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $idBeritaEksternal = $data['kodeTerbesar'];
                $urutan = (int) substr($idBeritaEksternal, 2, 4);
                $urutan++;

                $huruf = "BE";
                $idBeritaEksternal = $huruf.sprintf("%04s", $urutan);
               
            } else 
            {
                $idBeritaEksternal = "BE0001";
            }
        }
        return $idBeritaEksternal;
    }
    else
        return FALSE;   
}
?>