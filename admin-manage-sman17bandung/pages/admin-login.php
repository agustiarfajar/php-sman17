<?php 
include_once("functions.php");
?>
<?php 
$db = dbConnect();
if($db->connect_errno==0)
{
    if(isset($_POST["btnLogin"]))
    {
        $email = $db->escape_string($_POST["email"]);
        $password = $db->escape_string($_POST["pass"]);
        $sql = "SELECT * FROM administrator WHERE emailAdmin='$email' AND pass=PASSWORD('$password')";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows==1)
            {
                $data=$res->fetch_assoc();
                session_start();
                $_SESSION["idAdmin"]=$data["idAdmin"];
                $_SESSION["namaAdmin"]=$data["namaAdmin"];
                header("Location: admin-dashboard.php");
            }
            else 
                header("Location: ../login.php?error=1");
        }
    }
    else 
        header("Location: ../login.php?error=2");
}
else 
    header("Location: ../login.php?error=3");
?>