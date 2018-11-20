
@extends('layouts.sidebarAdmin')

@section('content')
<main class="pt-5 mx-lg-6">
<div class="container-fluid mt-5">
<div id="main-panel">
			<div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    	<a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home</a>
                        <span>/</span>
                        <span>Daftar Transaksi</span>
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
</main>
		@endsection
