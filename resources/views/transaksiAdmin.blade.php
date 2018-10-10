
@extends('layouts.sidebarAdmin')

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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Transaksi </a>
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
									<h3 class="panel-title"> Transaksi Berhasil</h3>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

                    <tr>
                        <td class="text-center text-nowrap">ID Penawaran</td>
                        <td class="text-center text-nowrap">Tanggal Beli</td>
                        <td class="text-center text-nowrap">No. Rek Agen</td>
                        <td class="text-center text-nowrap">Agen</td>
                        <td class="text-center text-nowrap">Nama Ikan</td>
                        <td class="text-center text-nowrap">Jumlah ikan</td>
                        <td class="text-center text-nowrap">Harga ikan</td>
												<td class="text-center text-nowrap">Status</td>
                      </tr>

                      @foreach($tampils as $data)
                      <tr>
                        <td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
                        <td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->pemilik->noRek}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->pemilik->name}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
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
		@endsection
