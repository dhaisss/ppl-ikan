@extends('layouts.sidebarAgen')

@section('content')

<div id="main-panel">
			<div id="top-nav">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<!-- Navbar toggle button -->
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
							</button>
							<!-- Sidebar toggle button -->
							<button type="button" class="sidebar-toggle">
								<i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Daftar Pengusaha </a>
						</div>
					</div>
				</nav>
			</div>
<div id="content">
				<div class="container-fluid">
					<!-- basic form -->

					<!-- Basic element -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Pengusaha</h3>
									  <span class="text-grey">Daftar pengusaha di Sepikan</span>
								</div>
								 <div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

									<tr>
											 <td class="text-center text-nowrap">Nama</td>
											<td class="text-center text-nowrap">Alamat</td>
											<td class="text-center text-nowrap">Kecamatan</td>
											<td class="text-center text-nowrap">Kabupaten</td>
											<td class="text-center text-nowrap">Provinsi</td>
											<td class="text-center text-nowrap">No. Telepon</td>
										</tr>

										@foreach($tampil as $data)
										<tr>

											<td class="text-center text-nowrap">{{$data->name}}</td>
											<td class="text-center text-nowrap">{{$data->alamat}}</td>
											<td class="text-center text-nowrap">{{$data->kecamatan}}</td>
											<td class="text-center text-nowrap">{{$data->kabupaten}}</td>
											<td class="text-center text-nowrap">{{$data->provinsi}}</td>
											<td class="text-center text-nowrap">{{$data->noTelepon}}</td>

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
		@endsection
