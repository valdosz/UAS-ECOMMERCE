<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UAS|E-Commerce</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-blueGray-50">
<!-- component -->
<div class="overflow-x-auto">
	<?php
		$by_jumlah_name  = "";
		$by_jumlah_count = null;

		$category = "";
		$jumlah   = null;

		foreach ($order_jumlah as $item)
		{
			$by_jumlah_name .= "'$item->name'".",";
			$by_jumlah_count .= "$item->jumlah".",";
		}

		foreach ($categories as $item)
		{
			$category .= "'$item->category'".",";
			$jumlah .= "$item->jumlah".",";
		}
	?>
	<div class="min-w-screen min-h-screen bg-gray-100 bg-gray-100 font-sans overflow-hidden p-10">
		<div class="flex">
            <div class="flex-1">
                <h1 class="text-2xl font-bold">UAS E-Commerce - Muhamad Rivaldi</h1>
            </div>
            <div class="flex-3">
                <a href="<?php echo site_url('/merek/');?>" class="bg-yellow-900 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-yellow-900">
                    Menu Transaksi <span class="fa fa-shopping-cart"></span>
                </a>
            </div>
		</div>
        <div class="flex-1">
            <a href="<?php echo site_url('/product/');?>" class="bg-purple-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-purple-700">
                Page Product <span class="fa fa-boxes"></span>
            </a>
        </div>
        <div class="flex-2">
            <a href="<?php echo site_url('/categoryproduct/');?>" class="bg-red-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-red-700">
                Page Category Product <span class="fa fa-boxes"></span>
            </a>
        </div>
        <div class="flex-3">
            <a href="<?php echo site_url('/merek/');?>" class="bg-blue-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-blue-700">
                Page Merek <span class="fa fa-boxes"></span>
            </a>
        </div>
        <div class="flex-1">
            <h1 class="text-2xl font-bold">Dashboard Administrator</h1>
        </div>
		<div class="flex mt-10 p-5 justify-center">
			<div class="w-1/2">
				<h3 class="font-bold text-center">Data Pembelian Bulan Lalu</h3>
				<canvas id="myChart" height="350" width="350" class="align-center mx-auto"></canvas>
			</div>
			<div class="w-1/2">
				<h3 class="font-bold text-center">Data Penjualan Terbanyak</h3>
				<canvas id="jumlahChart" height="350" width="350" class="align-center mx-auto"></canvas>
			</div>
		</div>
        <div class="flex mt-10 p-5 justify-center">
            <div class="w-1/2">
                <h3 class="font-bold text-center">Data Penjualan Harian</h3>
                <canvas id="myChart2" height="350" width="350" class="align-center mx-auto"></canvas>
            </div>
        </div>

	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	var kategoriCanvas = document.getElementById("kategoriChart");
	var byJumlahCanvas = document.getElementById("jumlahChart");


	var oilData = {
		labels: [
			<?= $category ?>
		],
		datasets: [
			{
				data: [<?= $jumlah ?>],
				backgroundColor: [
					"#FF6384",
					"#63FF84",
					"#84FF63",
					"#8463FF",
					"#6384FF"
				]
			}],
	};

	var pieChart = new Chart(kategoriCanvas, {
		type: 'pie',
		data: oilData,
		options: {
			responsive: false,
			maintainAspectRatio: false
		}
	});

	var byJumlahData = {
		labels: [
			<?= $by_jumlah_name ?>
		],
		datasets: [
			{
				label: '# Jumlah Penjualan Sekarang',
				data: [<?= $by_jumlah_count ?>],
				backgroundColor: [
					"#FF6384",
					"#63FF84",
					"#84FF63",
					"#8463FF",
					"#6384FF"
				]
			}],
	}

	var barChart = new Chart(byJumlahCanvas, {
		type: 'bar',
		data: byJumlahData,
		options: {
			responsive: false,
			maintainAspectRatio: false
		}
	});

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laptop", "Televisi", "Kipas Angin", "Panel Surya"],
            datasets: [{
                label: '# of Bulan Sebelumnya',
                data: [2, 1, 3, 2, 2, 3],
                backgroundColor: [
                    "#FF6384",
                    "#63FF84",
                    "#84FF63",
                    "#8463FF",
                    "#6384FF"
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
            datasets: [{
                label: '# of Penjualan Harian',
                data: [10, 1, 6, 5, 7, 4],
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(132,255,99, 1)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(132,255,99, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
