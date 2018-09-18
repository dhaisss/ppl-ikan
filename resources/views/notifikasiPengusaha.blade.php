
@extends('layouts.sidebarPengusaha')

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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Notifikasi </a>
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
									<h3 class="panel-title"> Pembelian diterima </h3>
									<br>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

									<tr>
											<td class="text-center text-nowrap">ID Penawaran</td>
											<td class="text-center text-nowrap">Tanggal Penawaran</td>
											<td class="text-center text-nowrap">Tanggal Beli</td>
											<td class="text-center text-nowrap">Agen</td>
                      <td class="text-center text-nowrap">Nama Ikan</td>
											<td class="text-center text-nowrap">Jenis Ikan</td>
                      <td class="text-center text-nowrap">Kategori Ikan</td>
											<td class="text-center text-nowrap">Jumlah ikan</td>
											<td class="text-center text-nowrap">Harga ikan</td>
											<td class="text-center text-nowrap">Action</td>
										</tr>

										@foreach($tampils as $data)
										<tr>
											<td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
											<td class="text-center text-nowrap">{{$data->transaksi->tanggalPenawaran}}</td>
											<td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
											<td class="text-center text-nowrap">{{$data->transaksi->pemilik->name}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
											<td class="text-center text-nowrap">{{$data->transaksi->jenis_ikan->jenisIkan}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
											<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
											 <td class="text-center text-nowrap">
											<a href="/lanjutkanTransaksi/{{$data->idTransaksi}}"><button type="submit" class="btn btn-success"> <font color="white">Lanjutkan</font></button></a>

										</tr>
										@endforeach

									</table>
									</div>

								</div>

							</div>
							<div class="col-xs-12">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<h3 class="panel-title">Pembelian ditolak</h3>
								</div>
								<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

                    <tr>
                        <td class="text-center text-nowrap">ID Penawaran</td>
                        <td class="text-center text-nowrap">Tanggal Penawaran</td>
                        <td class="text-center text-nowrap">Tanggal Beli</td>
                        <td class="text-center text-nowrap">Agen</td>
                        <td class="text-center text-nowrap">Nama Ikan</td>
                        <td class="text-center text-nowrap">Jenis Ikan</td>
                        <td class="text-center text-nowrap">Kategori Ikan</td>
                        <td class="text-center text-nowrap">Jumlah ikan</td>
                        <td class="text-center text-nowrap">Harga ikan</td>
                      </tr>


										@foreach($tampils2 as $data)
										<tr>
                      <td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->tanggalPenawaran}}</td>
                      <td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->pemilik->name}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->jenis_ikan->jenisIkan}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
                      <td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
                      <td class="text-center text-nowrap">{{$data->hargaIkan}}</td>

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
		@endsection
