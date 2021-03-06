@extends('layouts.sidebarPengusaha')

@section('content')
<main class="pt-4 mx-lg-7">
<div class="container-fluid mt-5">
<div id="main-panel">
			<div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                    	<a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home</a>
                        <span>/</span>
                        <span>Daftar Agen Penjual Ikan</span>
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
									<h3 class="panel-title">Daftar Agen</h3>
									  <span class="text-grey">daftar agen di Sepikan</span>
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
											<td class="text-center text-nowrap">{{$data->Desa->districts->name}}</td>
											<td class="text-center text-nowrap">{{$data->Desa->districts->regencies->name}}</td>
											<td class="text-center text-nowrap">{{$data->Desa->districts->regencies->provinces->name}}</td>
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
	</main>
		@endsection
