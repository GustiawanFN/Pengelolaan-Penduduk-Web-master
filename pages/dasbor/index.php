<?php include('../mode/top.php') ?> 


	<script src="util.js"></script>
<?php
    include('../../config/koneksi.php');
    $data_penduduk = mysqli_query($db, "SELECT tanggal_masuk , COUNT(tanggal_masuk) AS total_tanggal_masuk FROM penduduk WHERE  jk = 'Perempuan' and status= '1' or status = '2' GROUP BY tanggal_masuk");

    $data_tanggal_masuk = array();
    $data_total_tanggal_masuk = array();

    while ($data = mysqli_fetch_array($data_penduduk)) {
      $data_tanggal_masuk[] = $data['tanggal_masuk']; // Memasukan tanggal ke dalam array
      $data_total_tanggal_masuk[] = $data['total_tanggal_masuk']; // Memasukan total ke dalam array
    }
    $data_penduduk2 = mysqli_query($db, "SELECT tanggal_masuk , COUNT(tanggal_masuk) AS total_tanggal_masuk FROM penduduk WHERE  jk = 'Laki-laki' and status= '1' or status = '2' GROUP BY tanggal_masuk");

    $data_tanggal_masuk2 = array();
    $data_total_tanggal_masuk2 = array();

    while ($data2 = mysqli_fetch_array($data_penduduk2)) {
      $data_tanggal_masuk2[] = $data2['tanggal_masuk']; // Memasukan tanggal ke dalam array
      $data_total_tanggal_masuk2[] = $data2['total_tanggal_masuk']; // Memasukan total ke dalam array
    }
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <br>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h1 align="center">Selamat Datang Di Website Pengelolaan Penduduk Desa Cipetir</h1>

              <!-- <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul> -->

              <div class="clearfix">

              </div>
            </div>
        	<div style="width:80%;">
		        <canvas id="canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
     
	<script>
		// var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels:<?php echo json_encode($data_tanggal_masuk) ?>,
				datasets: [ {
					label: 'Laki-laki',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: <?php echo json_encode($data_total_tanggal_masuk2) ?>,
        }, {
					label: 'Perempuan',
					fill: false,
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data:<?php echo json_encode($data_total_tanggal_masuk) ?>,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Grafik Penduduk Masuk PerTahun'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					x: {
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'tahun'
						}
					},
					y: {
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'jumlah'
						}
					}
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	</script>
<!-- /page content -->


<?php include('../mode/bottom.php') ?>