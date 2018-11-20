
@extends('layouts.sidebarPengusaha')

@section('content')
<main class="pt-5 mx-lg-5">
<div class="container-fluid mt-5">
<div id="main-panel">
			<div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    	<a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home</a>
                        <span>/</span>
                        <span>Transaksi</span>
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
									<h3 class="panel-title"> Transaksi </h3>
									<span class="text-grey">oleh {{ Auth::user()->name }}</span>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

                    <tr>

                        <td class="text-center text-nowrap">Tanggal Penawaran</td>
                        <td class="text-center text-nowrap">Tanggal Beli</td>
                        <td class="text-center text-nowrap">Agen</td>
                        <td class="text-center text-nowrap">Nama Ikan</td>
                        <td class="text-center text-nowrap">Jenis Ikan</td>
                        <td class="text-center text-nowrap">Kategori Ikan</td>
                        <td class="text-center text-nowrap">Jumlah ikan</td>
                        <td class="text-center text-nowrap">Harga ikan</td>
												<td class="text-center text-nowrap">Status</td>
                      </tr>

                      @foreach($tampils as $data)
                      <tr>

                        <td class="text-center text-nowrap">{{$data->transaksi->tanggalPenawaran}}</td>
                        <td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
                        <td class="text-center text-nowrap">{{$data->transaksi->pemilik->name}}</td>
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
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"> Dalam Pengiriman </h3>
									<span class="text-grey">oleh {{ Auth::user()->name }}</span>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

										<tr>
												<td class="text-center text-nowrap">ID </td>
												<td class="text-center text-nowrap">Tanggal Beli</td>
												<td class="text-center text-nowrap">Agen</td>
												<td class="text-center text-nowrap">Nama Ikan</td>
												<td class="text-center text-nowrap">Jenis Ikan</td>
												<td class="text-center text-nowrap">Kategori Ikan</td>
												<td class="text-center text-nowrap">Jumlah ikan</td>
												<td class="text-center text-nowrap">Harga ikan</td>
												<td class="text-center text-nowrap">Action</td>
											</tr>

											@foreach($tampils2 as $data)
											<tr>
												<td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
												<td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->pemilik->name}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->jenis_ikan->jenisIkan}}</td>
												<td class="text-center text-nowrap">{{$data->transaksi->kategori->kategori}}</td>
												<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
												<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
												<td class="text-center text-nowrap">
													<a href="/telahDiterima/{{$data->idTransaksi}}"><button type="submit" class="btn btn-success"> <font color="white">Telah Diterima</font></button></a>

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
</main>
		@endsection
