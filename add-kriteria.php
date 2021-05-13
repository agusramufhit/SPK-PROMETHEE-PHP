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
		mysqli_query($db, "INSERT INTO kriteria(nama_kriteria, bobot, minmaks, tipe_preferensi, q, p) VALUES('$_POST[nama_kriteria]', '$_POST[bobot]', '$_POST[minmaks]', '$_POST[tipe_preferensi]', '$_POST[q]', '$_POST[p]')");
		header("location:kriteria.php");
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
                    <a style="text-decoration:none" href="kriteria.php" class="active"><span class="las la-clipboard-list"></span><span>Kriteria</span></a>
                </li>
                <li>
                    <a style="text-decoration:none" href="alternatif-kriteria.php"><span class="las la-clipboard-list"></span><span>Alternatif Kriteria</span></a>
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
                        <h1 class="mt-2 mb-5 text-center">Tambah Data Kriteria</h1>
                            <form id="form1" name="form1" method="post" action="">
                              <table class="table table-bordered col-4 mx-auto">
                                <tr>
                                  <th scope="row">Nama Kriteria</th>
                                  <td><input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" /></td>
                                </tr>
                                <tr>
                                  <th scope="row">Bobot</th>
                                  <td><input type="text" class="form-control" name="bobot" id="bobot" /></td>
                                </tr>
                                <tr>
                                  <th scope="row">Min Maks</th>
                                  <td><select name="minmaks" class="form-control" id="minmaks">
                                    <option value=""></option>
                                    <option value="minimasi">Minimasi</option>
                                    <option value="maksimasi">Maksimasi</option>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">Tipe Preferensi</th>
                                  <td><select name="tipe_preferensi" class="form-control" id="tipe_preferensi">
                                    <option value=""></option>
                                    <option value="I">I.Usual Criterion</option>
                                    <option value="II">II.Quasi Criterion</option>
                                    <option value="III">III.Criterion with Linear Preference</option>
                                    <option value="IV">IV.Level Criterion</option>
                                    <option value="V">V.Criterion with Linear Preference and Indifference Area</option>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">q</th>
                                  <td><input type="text" class="form-control" name="q" id="q" /></td>
                                </tr>
                                <tr>
                                  <th scope="row">p</th>
                                  <td><input type="text" class="form-control" name="p" id="p" /></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td><input type="submit" class="form-control btn btn-primary" name="button" id="button" value="Simpan" /></td>
                                </tr>
                              </table>
                            </form>
                    </div>
                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
    </body>
</html>

