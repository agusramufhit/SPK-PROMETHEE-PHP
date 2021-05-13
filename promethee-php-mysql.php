<?php
	include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SPK - Promethee</title>
  <link rel="stylesheet" href="./assets/css/bootstrap2.css">
  
  <link rel="stylesheet" href="./assets/css/main.css">
  <style type="text/css">
  .section-details-header {
        min-height: 310px;
        background: #141432;
        margin-top: -25px;
    }
  .navbar-1-2.navbar-light .navbar-nav .nav-link {
        color: #092a33;
        transition: 0.3s;
      }

      .navbar-1-2.navbar-light .navbar-nav .nav-link.active {
        font-weight: 500;
      }

      .navbar-1-2 .btn-get-started {
        border-radius: 20px;
        padding: 12px 30px;
        font-weight: 500;
      }

      .navbar-1-2 .btn-get-started-yellow {
        background-color: #ffdda9;
        color: #372642;
        transition: 0.3s;
      }

      .navbar-1-2 .btn-get-started-yellow:hover {
        background-color: #fcd396;
        color: #372642;
        transition: 0.3s;
      }
</style>
</head>
<body>
<section class="h-100 w-100 bg-white mx-auto" style="box-sizing: border-box">
    <nav class="navbar-1-2 navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body"
      style="font-family: Poppins, sans-serif">
      <div class="container">
        <a class="navbar-brand" href="#">
          <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.5 15.75C3.5 8.98451 8.98451 3.5 15.75 3.5H29.75C30.7165 3.5 31.5 4.2835 31.5 5.25C31.5 6.2165 30.7165 7 29.75 7H15.75C10.9175 7 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z"
              fill="#391484" />
            <path
              d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z"
              fill="#391484" />
          </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link px-md-4" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-md-4" href="promethee-php.php">Promethee</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-md-4 active" href="promethee-php-mysql.php">Analisa</a>
            </li>
          </ul>
          <div class="d-flex">
            <a class="btn btn-get-started btn-get-started-yellow" href="login.php">Login</a>
          </div>
        </div>
      </div>
    </nav>
  </section> 
<section class="section-details-header"></section>
<section class="section-details-content">
<div class="container">
 <div class="row">
	<div class="card card-details mx-auto">
		 <div class="row">
                    <div class="col text-center text-uppercase">
                        <strong>Analisa Menggunakan SPK Metode Promethee</strong>
                    </div>
 		</div>
<div id="perhitungan" style="display:none;">
<?php 
	$alternatif = array(); //array("Galaxy", "iPhone", "BB", "Lumia");
	
	$queryalternatif = mysqli_query($db, "SELECT * FROM alternatif ORDER BY id_alternatif");
	$i=0;
	while ($dataalternatif = mysqli_fetch_array($queryalternatif))
	{
		$alternatif[$i] = $dataalternatif['nama_alternatif'];
		$i++;
	}
	
	$kriteria = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Pelayanan Garansi", "Keawetan");
	$minmaks = array(); //array("minimasi", "maksimasi", "maksimasi", "maksimasi", "minimasi", "maksimasi");
	$tipe_preferensi = array(); //array("IV", "III", "III", "II", "V", "I");
	$q = array(); //array(500, 0, 0, 20, 1, 0);
	$p = array(); //array(1000, 20, 2, 0, 2, 0);
	$bobot = array(); //array(0.2, 0.25, 0.2, 0.125, 0.125, 0.1);
	
	$querykriteria = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
	$i=0;
	while ($datakriteria = mysqli_fetch_array($querykriteria))
	{
		$kriteria[$i] = $datakriteria['nama_kriteria'];
		$minmaks[$i] = $datakriteria['minmaks'];
		$bobot[$i] = $datakriteria['bobot'];
		$tipe_preferensi[$i] = $datakriteria['tipe_preferensi'];
		$q[$i] = $datakriteria['q'];
		$p[$i] = $datakriteria['p'];
		$i++;
	}
	
	$alternatifkriteria = array(); /*array(
							array(3500, 70, 10, 80, 1, 36),											
							array(4500, 90, 10, 60, 5, 48),												                            
							array(4000, 80, 9, 90, 2, 48),					                           
							array(4000, 70, 8, 50, 4, 60)
						  ); */
	
	$queryalternatif = mysqli_query($db, "SELECT * FROM alternatif ORDER BY id_alternatif");
	$i=0;
	while ($dataalternatif = mysqli_fetch_array($queryalternatif))
	{
		$querykriteria = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
		$j=0;
		while ($datakriteria = mysqli_fetch_array($querykriteria))
		{
			$queryalternatifkriteria = mysqli_query($db, "SELECT * FROM alternatif_kriteria WHERE id_alternatif = '$dataalternatif[id_alternatif]' AND id_kriteria = '$datakriteria[id_kriteria]'");
			$dataalternatifkriteria = mysqli_fetch_array($queryalternatifkriteria);
			
			$alternatifkriteria[$i][$j] = $dataalternatifkriteria['nilai'];
			$j++;
		}
		$i++;
	}
	
	$total_index_preferensi = array();
	$leaving_flow = array();
	$entering_flow = array();
	$net_flow = array();
	
	$alternatif_rangking = array();
	$net_flow_rangking = array();
						  
	echo "<br/>";
	echo "<table class=\"table table-bordered\">";
	echo "<tr>";
	echo "<td rowspan=2>Kriteria</td>";
	echo "<td rowspan=2>Min Maks</td>";
	echo "<td rowspan=2>Bobot</td>";
	echo "<td colspan=4 ".count($alternatif)."\">Alternatif</td>";
	echo "<td rowspan=2>Tipe Preferensi</td>";
	echo "<td colspan=2>Parameter</td>";
	echo "</tr>";
	echo "<tr>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<td>".$alternatif[$i]."</td>";
	}
	echo "<td>q</td>";
	echo "<td>p</td>";
	echo "</tr>";
	
	for ($i=0;$i<count($kriteria);$i++) {
		echo "<tr>";
		echo "<td>".$kriteria[$i]."</td>";
		echo "<td>".$minmaks[$i]."</td>";
		echo "<td>".$bobot[$i]."</td>";
		for ($j=0;$j<count($alternatif);$j++) {
			echo "<td>".$alternatifkriteria[$j][$i]."</td>";
		}
		echo "<td>".$tipe_preferensi[$i]."</td>";
		echo "<td>".$q[$i]."</td>";
		echo "<td>".$p[$i]."</td>";			
		echo "</tr>";
	}
	echo "</table>";
	
	for ($i=0;$i<count($alternatif);$i++) {
		for ($j=0;$j<count($alternatif);$j++) {
			$total_index_preferensi[$i][$j] = 0;
		}
	}
	
	for ($i=0;$i<count($kriteria);$i++) {
		echo "<br/>";
		echo "<table class=\"table table-bordered\">";
		echo "<tr>";
		echo "<td colspan=2>".$kriteria[$i]."</td>";
		echo "<td>a</td>";
		echo "<td>b</td>";
		echo "<td>d(jarak)</td>";
		echo "<td>|d|</td>";
		echo "<td>P(Preferensi)</td>";
		echo "<td>P(Indeks Preferensi)</td>";
		echo "</tr>";
		for ($j=0;$j<count($alternatif);$j++) {
			for ($k=$j+1;$k<count($alternatif);$k++) {
				echo "<tr>";
				echo "<td>".$alternatif[$j]."</td>";
				echo "<td>".$alternatif[$k]."</td>";
				echo "<td>".$alternatifkriteria[$j][$i]."</td>";
				echo "<td>".$alternatifkriteria[$k][$i]."</td>";
				$d = ($alternatifkriteria[$j][$i]-$alternatifkriteria[$k][$i]);
				echo "<td>".$d."</td>";
				$d_abs = abs($alternatifkriteria[$j][$i]-$alternatifkriteria[$k][$i]);
				echo "<td>".$d_abs."</td>";
				if (($minmaks[$i] == "minimasi") && ($alternatifkriteria[$j][$i] >= $alternatifkriteria[$k][$i])) 
				{
					$P = 0;
				}
				else if (($minmaks[$i] == "maksimasi") && ($alternatifkriteria[$j][$i] <= $alternatifkriteria[$k][$i])) 
				{
					$P = 0;
				}
				else 
				{
					if ($tipe_preferensi[$i] == "I")
					{
						if ($d == 0)
						{
							$P = 0;
						}
						else //if ($d != 0)
						{
							$P = 1;
						}
					} 
					else if ($tipe_preferensi[$i] == "II")
					{
						if (($d <= $q[$i]) && ($d >= (-1 * $q[$i])))
						{
							$P = 0;
						}
						else //if (($d > $q[$i]) && ($d < (-1 * $q[$i])))
						{
							$P = 1;
						}
					}
					else if ($tipe_preferensi[$i] == "III")
					{
						if (($d <= $p[$i]) && ($d >= (-1 * $p[$i])))
						{
							$P = $d_abs / $p[$i];
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						}
					}
					else if ($tipe_preferensi[$i] == "IV")
					{
						if (($d <= $q[$i]) && ($d >= -1 * ($q[$i])))
						{
							$P = 0;
						}
						else if ((($d <= $p[$i]) && ($d > $q[$i])) || (($d >= -1 * ($p[$i])) && ($d < -1 * ($q[$i])))) 
						{
							$P = 0.5;
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						} 
					}
					else if ($tipe_preferensi[$i] == "V")
					{
						if (($d <= $q[$i]) && ($d >= -1 * ($q[$i])))
						{
							$P = 0;
						}
						else if ((($d <= $p[$i]) && ($d > $q[$i])) || (($d >= -1 * ($p[$i])) && ($d < -1 * ($q[$i])))) 
						{
							$P = ($d_abs - $q[$i]) / ($p[$i] - $q[$i]);
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						} 
					}
				}
				echo "<td>".$P."</td>";
				$IP = $bobot[$i] * $P;
				echo "<td>".$IP."</td>";
				echo "</tr>";
				$total_index_preferensi[$j][$k] = $total_index_preferensi[$j][$k] + $IP;
				
				echo "<tr>";
				echo "<td>".$alternatif[$k]."</td>";
				echo "<td>".$alternatif[$j]."</td>";
				echo "<td>".$alternatifkriteria[$k][$i]."</td>";
				echo "<td>".$alternatifkriteria[$j][$i]."</td>";
				$d = ($alternatifkriteria[$k][$i]-$alternatifkriteria[$j][$i]);
				echo "<td>".$d."</td>";
				$d_abs = abs($alternatifkriteria[$k][$i]-$alternatifkriteria[$j][$i]);
				echo "<td>".$d_abs."</td>";
				if (($minmaks[$i] == "minimasi") && ($alternatifkriteria[$k][$i] >= $alternatifkriteria[$j][$i])) 
				{
					$P = 0;
				}
				else if (($minmaks[$i] == "maksimasi") && ($alternatifkriteria[$k][$i] <= $alternatifkriteria[$j][$i])) 
				{
					$P = 0;
				}
				else 
				{
					if ($tipe_preferensi[$i] == "I")
					{
						if ($d == 0)
						{
							$P = 0;
						}
						else //if ($d != 0)
						{
							$P = 1;
						}
					} 
					else if ($tipe_preferensi[$i] == "II")
					{
						if (($d <= $q[$i]) && ($d >= (-1 * $q[$i])))
						{
							$P = 0;
						}
						else //if (($d > $q[$i]) && ($d < (-1 * $q[$i])))
						{
							$P = 1;
						}
					}
					else if ($tipe_preferensi[$i] == "III")
					{
						if (($d <= $p[$i]) && ($d >= (-1 * $p[$i])))
						{
							$P = $d_abs / $p[$i];
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						}
					}
					else if ($tipe_preferensi[$i] == "IV")
					{
						if (($d <= $q[$i]) && ($d >= -1 * ($q[$i])))
						{
							$P = 0;
						}
						else if ((($d <= $p[$i]) && ($d > $q[$i])) || (($d >= -1 * ($p[$i])) && ($d < -1 * ($q[$i])))) 
						{
							$P = 0.5;
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						} 
					}
					else if ($tipe_preferensi[$i] == "V")
					{
						if (($d <= $q[$i]) && ($d >= -1 * ($q[$i])))
						{
							$P = 0;
						}
						else if ((($d <= $p[$i]) && ($d > $q[$i])) || (($d >= -1 * ($p[$i])) && ($d < -1 * ($q[$i])))) 
						{
							$P = ($d_abs - $q[$i]) / ($p[$i] - $q[$i]);
						}
						else //if (($d > $p[$i]) && ($d < (-1 * $p[$i])))
						{
							$P = 1;
						} 
					}
				}
				echo "<td>".$P."</td>";
				$IP = $bobot[$i] * $P;
				echo "<td>".$IP."</td>";
				echo "</tr>";
				$total_index_preferensi[$k][$j] = $total_index_preferensi[$k][$j] + $IP;
			}
		}
		echo "</table>";		
	}

	echo "<br/>";
	echo "Total Index Preferensi";
	echo "<table class=\"table table-bordered\">";
	for ($i=0;$i<count($alternatif);$i++) {
		for ($j=$i+1;$j<count($alternatif);$j++) {
			echo "<tr>";
			echo "<td>".$alternatif[$i]."</td>";
			echo "<td>".$alternatif[$j]."</td>";
			echo "<td>".$total_index_preferensi[$i][$j]."</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>".$alternatif[$j]."</td>";
			echo "<td>".$alternatif[$i]."</td>";
			echo "<td>".$total_index_preferensi[$j][$i]."</td>";
			echo "</tr>";
		}
	}
	echo "</table>";		

	echo "<br/>";
	echo "<table class=\"table table-bordered\">";
	echo "<tr>";
	echo "<td>Alternatif</td>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<td>".$alternatif[$i]."</td>";
		$leaving_flow[$i] = 0;
		$entering_flow[$i] = 0;
		$net_flow[$i] = 0;
	}
	echo "<td>Jumlah</td>";
	echo "<td>Leaving</td>";
	echo "</tr>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<tr>";
		echo "<td>".$alternatif[$i]."</td>";
		for ($j=0;$j<count($alternatif);$j++) {
			echo "<td>".$total_index_preferensi[$i][$j]."</td>";
			$leaving_flow[$i] = $leaving_flow[$i] + $total_index_preferensi[$i][$j];
			$entering_flow[$j] = $entering_flow[$j] + $total_index_preferensi[$i][$j];
		}
		echo "<td>".$leaving_flow[$i]."</td>";
		$leaving_flow[$i] = $leaving_flow[$i] / (count($alternatif) - 1);
		echo "<td>".$leaving_flow[$i]."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td>Jumlah</td>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<td>".$entering_flow[$i]."</td>";
	}
	echo "<td>&nbsp;</td>";
	echo "<td>&nbsp;</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Entering</td>";
	for ($i=0;$i<count($alternatif);$i++) {
		$entering_flow[$i] = $entering_flow[$i] / (count($alternatif) - 1);
		echo "<td>".$entering_flow[$i]."</td>";
	}
	echo "<td>&nbsp;</td>";
	echo "<td>&nbsp;</td>";
	echo "</tr>";
	echo "</table>";
	
	echo "<br/>";	
	echo "<table class=\"table table-bordered\">";
	echo "<tr>";
	echo "<td>Alternatif</td>";
	echo "<td>Leaving Flow</td>";
	echo "<td>Entering Flow</td>";
	echo "<td>Net Flow</td>";
	echo "</tr>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<tr>";
		echo "<td>".$alternatif[$i]."</td>";
		echo "<td>".$leaving_flow[$i]."</td>";
		echo "<td>".$entering_flow[$i]."</td>";
		$net_flow[$i] = $leaving_flow[$i] - $entering_flow[$i];
		echo "<td>".$net_flow[$i]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	for ($i=0;$i<count($alternatif);$i++) {
		$net_flow_rangking[$i] = $net_flow[$i];
		$alternatif_rangking[$i] = $alternatif[$i];
	}

	for ($i=0;$i<count($alternatif);$i++) {
		for ($j=$i;$j<count($alternatif);$j++) {
			if ($net_flow_rangking[$i] < $net_flow_rangking[$j]) {
				$tmp_net_flow = $net_flow_rangking[$i];
				$tmp_alternatif = $alternatif_rangking[$i];
				$net_flow_rangking[$i] = $net_flow_rangking[$j];
				$alternatif_rangking[$i] = $alternatif_rangking[$j];
				$net_flow_rangking[$j] = $tmp_net_flow;
				$alternatif_rangking[$j] = $tmp_alternatif;
			}
		}
	}
	echo "<br/>";
	echo "<table class=\"table table-bordered\">";
	echo "<tr>";
	echo "<td>Alternatif</td>";
	echo "<td>Net Flow</td>";
	echo "<td>Rangking</td>";
	echo "</tr>";
	for ($i=0;$i<count($alternatif);$i++) {
		echo "<tr>";
		echo "<td>".$alternatif_rangking[$i]."</td>";
		echo "<td>".$net_flow_rangking[$i]."</td>";
		echo "<td>".($i+1)."</td>";
		echo "</tr>";
	}
	echo "</table>";

    ?>
</div>
<br />
<input type="button" class="btn btn-success" value="Perhitungan" onclick="document.getElementById('perhitungan').style.display='block';"/>
<br />
<br />
<table class="table table-bordered">
	<tr>
    	<td>Ranking</td>
    	<td>Alternatif</td>
    	<td>Nilai</td>
    </tr>
<?php
	for ($i=0;$i<count($net_flow_rangking);$i++)
	{	
?>
    <tr>
    	<td><?php echo ($i+1); ?></td>
    	<td><?php echo $alternatif_rangking[$i]; ?></td>
    	<td><?php echo $net_flow_rangking[$i]; ?></td>
    </tr>
<?php
	}
?>
</table>
<br />
<br />
Alternatif Produk Terbaik = <?php echo $alternatif_rangking[0]; ?> dengan Nilai Terbesar = <?php echo $net_flow_rangking[0]; ?>
<br />
<br />
</td>
  </tr>
</table></div>
	</div></div></section>
</body>
</html>