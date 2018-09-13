
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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Penawaran Ikan </a>
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
									<h3 class="panel-title">Data Penawaran Ikan</h3>
									  <span class="text-grey">oleh {{ Auth::user()->name }}</span>
								</div>
								 <div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

									<tr>
											<td class="text-center text-nowrap">Tanggal</td>
											<td class="text-center text-nowrap">Jenis Ikan</td>
											<td class="text-center text-nowrap">Nama Ikan</td>
											<td class="text-center text-nowrap">Jumlah (kg)</td>
											<td class="text-center text-nowrap">Harga (Rp)</td>
											<td class="text-center text-nowrap">Status</td>
											<td class="text-center text-nowrap">Agen</td>
											 <td class="text-center text-nowrap">Action</td>
										</tr>

										@foreach($tampil as $data)

										<tr>
											<td class="text-center text-nowrap">{{$data->tanggalPenawaran}}</td>
											<td class="text-center text-nowrap">{{$data->jenisIkan->jenisIkan}}</td>
											<td class="text-center text-nowrap">{{$data->namaIkan}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
											<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
											<td class="text-center text-nowrap">{{$data->statusIkan->statusIkan}}</td>
											<td class="text-center text-nowrap">{{$data->pemilik->name}}</td>
											<td class="text-center text-nowrap">
											<a href="/editPenawaran/{{$data->idPenawaran}}"><button type="submit" class="btn btn-success"><i class="fa fa-fw fa-list-alt"></i><font color="white">Ubah</font></button></a>
											</td>
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
