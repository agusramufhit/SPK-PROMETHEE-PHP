<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
	if (isset($_POST['button']))
	{
		mysqli_query($db, "UPDATE alternatif_kriteria SET id_alternatif='$_POST[id_alternatif]', id_kriteria='$_POST[id_kriteria]', id='$_POST[id]', nilai='$_POST[nilai]' WHERE id_alternatif_kriteria = '$_POST[id_alternatif_kriteria]'");
		header("location:alternatif-kriteria.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SPK - PROMETHEE</title>
        <link href="./assets/css/styles.css" rel="stylesheet" />
        <link href="./assets/css/style2.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span style="font-size: 25px;">SPK PROMETHEE</span>  </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a style="text-decoration:none" href="admin.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a style="text-decoration:none" href="alternatif.php"><span class="las la-clipboard-list"></span><span>Alternatif</span></a>
                </li>
                <li>
                    <a style="text-decoration:none" href="kriteria.php"><span class="las la-clipboard-list"></span><span>Kriteria</span></a>
                </li>
                <li>
                    <a style="text-decoration:none" href="alternatif-kriteria.php" class="active"><span class="las la-clipboard-list"></span><span>Alternatif Kriteria</span></a>
                </li>
                <li>
                    <a style="text-decoration:none" href="ganti-password.php"><span class="las la-user-circle"></span><span>Ganti Password</span></a>
                </li>
            </ul>
        </div>
        </div>


        <div class="main-content">
        <header> 
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <ul class="navbar-nav ml-auto ml-md-0">
                 <li class="nav-item dropdown text-uppercase">
                  <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <img src="./assets/img/icon-user.png" width="40px" height="40px" alt="" class="rounded-circle mr-2 profile-picture" />
                    Hi, <?php echo $_SESSION['userlogin']; ?>
                  </a>
                  <div class="dropdown-menu">
                    <a href="logout.php" class="dropdown-item">Logout</a>
                </li>
            </ul>
        </header>
            <main>
                    <div class="container-fluid">
                        <h1 class="mt-2 mb-5 text-center">Edit Data Alternatif Kriteria</h1>
                              <?php
                                $queryalternatifkriteria = mysqli_query($db, "SELECT * FROM alternatif_kriteria WHERE id_alternatif_kriteria = '$_GET[id_alternatif_kriteria]'");
                                $dataalternatifkriteria = mysqli_fetch_array($queryalternatifkriteria);
                              ?>
                                <form id="form1" name="form1" method="post" action="">
                                  <table class="table table-bordered col-4 mx-auto">
                                    <tr>
                                      <td>ID Alternatif Kriteria</td>
                                      <td><input type="text" class="form-control" name="id_alternatif_kriteria" id="id_alternatif_kriteria" readonly value="<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>" /></td>
                                    </tr>
                                    <tr>
                                      <td> Alternatif</td>
                                      <td><select class="form-control" name="id_alternatif" id="id_alternatif">
                                        <option value=""></option>
                                        <?php
                                            $queryalternatif = mysqli_query($db, "SELECT * FROM alternatif ORDER BY id_alternatif");
                                            while ($dataalternatif = mysqli_fetch_array($queryalternatif))
                                            {
                                        ?>
                                                <option value="<?php echo $dataalternatif['id_alternatif']; ?>" <?php if ($dataalternatifkriteria['id_alternatif'] == $dataalternatif['id_alternatif']) { echo " selected"; } ?>><?php echo $dataalternatif['nama_alternatif']; ?></option>
                                                <?php
                                            }
                                        ?>
                                      </select></td>
                                    </tr>
                                    <tr>
                                      <td>Kriteria</td>
                                      <td><select class="form-control" name="id_kriteria" id="id_kriteria">
                                          <option value=""></option>
                                          <?php
                                                $querykriteria = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
                                                while ($datakriteria = mysqli_fetch_array($querykriteria))
                                                {
                                            ?>
                                                    <option value="<?php echo $datakriteria['id_kriteria']; ?>" <?php if ($dataalternatifkriteria['id_kriteria'] == $datakriteria['id_kriteria']) { echo " selected"; } ?>><?php echo $datakriteria['nama_kriteria']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                      </select></td>
                                    </tr>
                                    <tr>
                                        <td>Sub Kriteria</td>
                                        <td><select name="id" class="form-control" id="id">
                                            <option>---Pilih Sub Kriteria---</option>
                                            </select></td>
                                        </tr>
                                    <tr>
                                    <tr>
                                      <td>Nilai</td>
                                      <td><input type="text" class="form-control" name="nilai" id="nilai" value="<?php echo $dataalternatifkriteria['nilai']; ?>" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td><input type="submit" name="button" class="form-control btn btn-primary" id="button" value="Simpan" /></td>
                                    </tr>
                                  </table>
                                </form>
                    </div>
                </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
        <script>
        $(document).ready(function(){
            $('#id_kriteria').on('change',function(){
                var id_kriteria = $(this).val();
                $.ajax({
                    url:'sub_data.php',
                    type:"POST",
                    data:{
                        modul:'subkriteria',
                        id:id_kriteria
                    },
                    success:function(respond){
                        $("#id").html(respond);
                    },
                    error:function(){
                        alert("Gagal Mengambil Data");
                    }
                })
            })
        });
    </script>
    </body>
</html>


