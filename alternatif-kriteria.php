<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
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
                        <h1 class="mt-4 mb-5">Data Alternatif Kriteria</h1>
                            <table class="table table-bordered">
                                <tr>
                                <th scope="col">ID Alternatif Kriteria</th>
                                <th scope="col">Nama Alternatif</th>
                                <th scope="col">Nama Kriteria</th>
                                <th scope="col">Sub Kriteria(Bobot)</th>
                                <th scope="col">Nilai</th>
                                <th scope="col" class="text-center"><a href="add-alternatif-kriteria.php" class="btn btn-secondary">Add</a></th>
                                </tr>
                                <?php
                                    $no=1;
                                    //$queryalternatifkriteria = mysqli_query($db, "SELECT * FROM alternatif_kriteria LFET JOIN alternatif ON alternatif_kriteria.id_alternatif = alternatif.id_alternatif LEFT JOIN kriteria ON alternatif_kriteria.id_kriteria = kriteria.id_kriteria ORDER BY id_alternatif, id_kriteria");
                                    $queryalternatifkriteria = mysqli_query($db, "SELECT * FROM alternatif_kriteria ORDER BY id_alternatif, id_kriteria, id");
                                    while ($dataalternatifkriteria = mysqli_fetch_array($queryalternatifkriteria))
                                    {
                                        
                                        $queryalternatif = mysqli_query($db, "SELECT * FROM alternatif WHERE id_alternatif = '$dataalternatifkriteria[id_alternatif]'");
                                        $dataalternatif = mysqli_fetch_array($queryalternatif);
                                        $querykriteria = mysqli_query($db, "SELECT * FROM kriteria WHERE id_kriteria = '$dataalternatifkriteria[id_kriteria]'");
                                        $datakriteria = mysqli_fetch_array($querykriteria);
                                        $querysubkriteria = mysqli_query($db, "SELECT * FROM sub_kriteria WHERE id = '$dataalternatifkriteria[id]'");
                                        $datasubkriteria = mysqli_fetch_array($querysubkriteria);
                                ?>
                                <tr>
                                <th scope="row"><?php echo "$no";$no++;?></th>
                                <td><?php echo $dataalternatif['nama_alternatif']; ?></td>
                                <td><?php echo $datakriteria['nama_kriteria']; ?></td>
                                <td><?php echo $datasubkriteria['kriteria']; ?></td>
                                <td><?php echo $dataalternatifkriteria['nilai']; ?></td>
                                <td class="text-center"><a href="edit-alternatif-kriteria.php?id_alternatif_kriteria=<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>" class="btn btn-danger">Edit</a> 
                                <a href="del-alternatif-kriteria.php?id_alternatif_kriteria=<?php echo $dataalternatifkriteria['id_alternatif_kriteria']; ?>" class="btn btn-success" onclick="sweetAlert()">Del</a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                    </div>
                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
        function sweetAlert() 
        {  
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Deleted'
            })
        }

        </script>
    </body>
</html>

