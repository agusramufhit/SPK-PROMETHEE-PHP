<?php 
session_start();
include("koneksi.php");
if (@$_SESSION['userlogin'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
$id = $_POST['id'];
$modul = $_POST['modul'];

if ($modul=='subkriteria') {
    $querykriteria = mysqli_query($db,"SELECT * FROM sub_kriteria where id_sub_kriteria='$id' order by kriteria ASC")or die(mysqli_error($db));
    $subkriteria='<option>---Pilih Sub Kriteria---</option>';
    while ($datakriteria = mysqli_fetch_array($querykriteria)) {
        $subkriteria.='<option value="'.$datakriteria['id'].'">'.$datakriteria['kriteria'].'</option>';
    }
    echo $subkriteria;
    }
?>