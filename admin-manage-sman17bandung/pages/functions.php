<?php 
define("DEVELOPMENT", TRUE);
include_once("layout.php");
function dbConnect()
{
    $db = new mysqli("localhost","root","","sman17");
    return $db;
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
        <h5><i class="icon fas fa-check"></i> Informasi</h5>
        <?php echo $message ?>
    </div>
<?php
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
                $id_kelas = $data['kodeTerbesar'];
                $urutan = (int) substr($id_kelas, 1, 3);
                $urutan++;

                $huruf = "G";
                $id_kelas = $huruf.sprintf("%04s", $urutan);
               
            } else 
            {
                $id_kelas = "G0001";
            }
        }
        return $id_kelas;
    }
    else
        return FALSE;   
}
?>