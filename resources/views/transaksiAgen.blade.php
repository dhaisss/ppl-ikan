
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
									<h3 class="panel-title"> Transaksi </h3>
									<span class="text-grey">oleh {{ Auth::user()->name }}</span>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

                    <tr>
                        <td class="text-center text-nowrap">ID </td>
                        <td class="text-center text-nowrap">Tanggal Beli</td>
                        <td class="text-center text-nowrap">Pengusaha</td>
                        <td class="text-center text-nowrap">Nama Ikan</td>
                        <td class="text-center text-nowrap">Kategori Ikan</td>
                        <td class="text-center text-nowrap">Jumlah ikan</td>
												<td class="text-center text-nowrap">Alamat</td>
                        <td class="text-center text-nowrap">Kabupaten</td>
												<td class="text-center text-nowrap">Provinsi</td>
												<td class="text-center text-nowrap">Action</td>
                      </tr>

                      @foreach($tampils as $data)
                      <tr>
                        <td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
                        <td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
                        <td class="text-center text-nowrap">{{$data->pembeli_ikan->name}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
                        <td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
                        <td class="text-center text-nowrap">{{$data->pembeli_ikan->alamat}}</td>
												<td class="text-center text-nowrap">{{$data->pembeli_ikan->kabupaten}}</td>
												<td class="text-center text-nowrap">{{$data->pembeli_ikan->provinsi}}</td>
												<td class="text-center text-nowrap">
													<a href="/telahDikirim/{{$data->idTransaksi}}"><button type="submit" class="btn btn-success"> <font color="white">Telah Dikitim</font></button></a>

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
		</div>
		@endsection
