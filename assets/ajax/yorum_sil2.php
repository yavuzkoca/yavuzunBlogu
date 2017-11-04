<?php
session_start();
$yazi_id = $_POST['id'];

include_once('../../baglanti.php');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$yorum_secme = mysqli_query($con,"SELECT * FROM `yorumlar` WHERE `id` ='". mysqli_real_escape_string($con,$yazi_id)."'");
//var_dump($_SESSION);

    while($yorum_satir = mysqli_fetch_assoc($yorum_secme)){
        if(!($_SESSION['kullanici_adi'] == $yorum_satir['kullanici_adi'])){
            echo 'Basarisiz';
        }else{
            $delete = "DELETE FROM `yorumlar` WHERE `id` ='". mysqli_real_escape_string($con,$yazi_id)."'";
            $as = mysqli_query($con, $delete);
            if($as){
                echo 'Basarili';
            }
            else{
                echo 'Basarisiz';
            }
        }

    }
//header('Location: ' . $_SERVER['HTTP_REFERER']);

?>