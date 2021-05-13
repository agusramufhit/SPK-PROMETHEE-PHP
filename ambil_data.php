    <?php 
    include "koneksi.php";
    $id_kriteria = $_POST['id_kriteria'];
    $modul = $_POST['modul'];
    
    if ($modul=='sub_kriteria') {
        $sql = mysqli_query($db,"SELECT * FROM sub_kriteria where id_sub_kriteria='$id_kriteria' order by name ASC")or die(mysqli_error($db));
        $sub_kriteria='<option>---Pilih Sub Kriteria---</option>';
        while ($dt = mysqli_fetch_array($sql)) {
            $sub_kriteria.='<option value="'.$dt['id_kriteria'].'">'.$dt['kriteria'].'</option>';
        }

        echo $sub_kriteria;
    }
    
    ?>