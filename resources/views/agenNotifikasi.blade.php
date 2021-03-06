
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Laravel</title>
	<!-- Font Awesome -->
	<link href="{{url('atema/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{url('atema/css/font-awesome.css')}}" rel="stylesheet">
	<!-- Bootstrap core CSS -->
	<link href="{{url('atema/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="{{url('atema/css/mdb.min.css')}}" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="{{url('atema/css/style.min.css')}}" rel="stylesheet">
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
<header>

	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
		<div class="container-fluid">

			<!-- Brand -->
			<a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
				<strong class="blue-text">SEPIKAN</strong>
			</a>

			<!-- Collapse -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Links -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<!-- Left -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link waves-effect" href="#"><i class="fa fa-home mr-2"></i>Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>

				<!-- Right -->
				<ul class="navbar-nav nav-flex-icons">
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mr-2"></i>Logout</a>
					</li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</ul>

			</div>

		</div>
	</nav>
	<!-- Navbar -->

	<!-- Sidebar -->
	<div class="sidebar-fixed position-fixed">

		<div class="sidebar-avatar-image">
			<span><img style="border-radius:20px; margin: 10px 60px;" src="/profil/{{Auth::user()->foto}}" width="100px" height="125px" align="center"></span>
		</div>
		<div class="sidebar-avatar">
			<div style="margin: 10px auto;text-align: center;"class="sidebar-avatar-text"> <strong>{{ Auth::user()->name }}</strong></div>
		</div>

		<div class="list-group list-group-flush">
			<a href="{{ url('/dashboardAgen') }}" class="list-group-item active waves-effect">
				<i class="fa fa-pie-chart mr-3"></i>Dashboard
			</a>

			<a href="{{ url('/profilAgen/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-user mr-3"></i>Profile</a>

			<a href="{{ url('/daftarPengusaha') }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-users mr-3"></i>Daftar Pengusaha</a>

			<a href="{{ url('/buatPenawaran') }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-pencil-square mr-3"></i>Buat Penawaran Ikan</a>

			<a href="{{ url('/daftarPenawaran/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-address-book mr-3"></i>Daftar Penawaran</a>

			<a href="{{ url('/agenNotifikasi/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-commenting mr-3"></i>Notifikasi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge" style="background-color: black"></span></a>

			<a href="{{ url('/transaksiAgen/'.Auth::user()->id) }}" class="list-group-item list-group-item-action waves-effect">
				<i class="fa fa-money mr-3"></i>Transaksi</a>
		</div>

	</div>
	<!-- Sidebar -->

</header>
<!--Main Navigation-->

<main class="pt-4 mx-lg-8">
	<div class="container-fluid mt-5">
		<div id="main-panel">
			<div class="card mb-4 wow fadeIn">

				<!--Card content-->
				<div class="card-body d-sm-flex justify-content-between">

					<h4 class="mb-2 mb-sm-0 pt-1">
						<span>Notifikasi</span>
					</h4>
				</div>

			</div>
			<!-- basic form -->

			<!-- Basic element -->
			<div class="row">
				<div class="col-md-12">
					<div class="card card-body">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"> Notifikasi Pembelian </h3>

								<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

										<tr>

											<td class="text-center text-nowrap">Tanggal Beli</td>
											<td class="text-center text-nowrap">Nama Ikan</td>
											<td class="text-center text-nowrap">Jenis Ikan</td>
											<td class="text-center text-nowrap">Kategori Ikan</td>
											<td class="text-center text-nowrap">Harga Ikan</td>
											<td class="text-center text-nowrap">Harga Nego</td>
											<td class="text-center text-nowrap">Jumlah Ikan</td>
											<td class="text-center text-nowrap">Pengusaha</td>
											<td class="text-center text-nowrap">Action</td>
										</tr>


										@foreach($notif as $data)
											<tr>

												<td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->jenis_ikan->jenisIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->hargaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
												<td class="text-center text-nowrap">{{$data->pembeli_ikan->name}}</td>
												<td class="text-center text-nowrap">

													<a href="/terimaTransaksi/{{$data->idTransaksi}}"><button type="submit" class="btn btn-success"> <font color="white">Terima</font></button></a>
													<a href="/tolakTransaksi/{{$data->idTransaksi}}"><button type="submit" class="btn btn-danger"> <font color="white">Tolak</font></button></a>
												</td>
											</tr>
										@endforeach

									</table>
								</div>


							</div>

						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"> Dalam Pengiriman </h3>
								<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

										<tr>
											<td class="text-center text-nowrap">ID </td>

											<td class="text-center text-nowrap">Tanggal Beli</td>
											<td class="text-center text-nowrap">Pengusaha</td>
											<td class="text-center text-nowrap">Nama Ikan</td>
											<td class="text-center text-nowrap">Jenis Ikan</td>
											<td class="text-center text-nowrap">Kategori Ikan</td>
											<td class="text-center text-nowrap">Jumlah ikan</td>
											<td class="text-center text-nowrap">Harga ikan</td>
											<td class="text-center text-nowrap">Status</td>
										</tr>

										@foreach($tampils as $data)
											<tr>
												<td class="text-center text-nowrap">{{$data->idTransaksi}}</td>

												<td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
												<td class="text-center text-nowrap">{{$data->pembeli_ikan->name}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->jenis_ikan->jenisIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
												<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
												<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->status->statusTransaksi}}</td>
											</tr>
										@endforeach

									</table>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript" src="{{url('atema/js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{url('atema/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{url('atema/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{url('atema/js/mdb.min.js')}}"></script>

</body>

</html>

