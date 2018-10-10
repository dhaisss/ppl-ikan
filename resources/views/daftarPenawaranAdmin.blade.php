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
						<a class="navbar-brand text-size-24" href="#"><i class="fa fa-list-alt"></i> Daftar Penawaran Ikan </a>
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
								<h3 class="panel-title">Penawaran Ikan</h3>
								<span class="text-grey">Oleh Agen Penjual Ikan</span>
							</div>
							<div class="panel-body table-responsive table-full">
								<table class="table table-stripped table-bordered">

									<tr>
										<td class="text-center text-nowrap">Tanggal</td>
										<td class="text-center text-nowrap">Jenis Ikan</td>
										<td class="text-center text-nowrap">kategori Ikan</td>
										<td class="text-center text-nowrap">Nama Ikan</td>
										<td class="text-center text-nowrap">Jumlah (kg)</td>
										<td class="text-center text-nowrap">Harga (Rp)</td>
										<td class="text-center text-nowrap">Status</td>
										<td class="text-center text-nowrap">Action</td>
									</tr>




									@foreach($tampil as $data)
										<tr>
											<td class="text-center text-nowrap">{{$data->tanggalPenawaran}}</td>
											<td class="text-center text-nowrap">{{$data->jenis_ikan->jenisIkan}}</td>
											<td class="text-center text-nowrap">{{$data->kategori->kategori}}</td>
											<td class="text-center text-nowrap">{{$data->namaIkan}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahIkan}}</td>
											<td class="text-center text-nowrap">{{$data->hargaIkan}}</td>
											<td class="text-center text-nowrap">{{$data->status_penawaran->statusIkan}}</td>
											<td class="text-center text-nowrap">
												<button type="button" class="btn btn-floyd" data-image="{{$data->fotoIkan}}" data-toggle="modal" data-target="#myModal" data-class="modal-default">Lihat</button>&nbsp
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
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span></span>
					</div>
					<div class="modal-body">
						<p class="text-center">
							<span class="text-size-24">Foto Ikan</span><br>
							<img width="400px" id="gambar"><br><br>

						</p>
					</div>
					<div class="modal-footer"></div>
				</div>
			</div>
		</div>
		@endsection

		@section('script')

			<script>
                $("#modal-normal > .panel-body > button").each(function(){
                    var cls = $(this).data('class');
                    $(this).click(function(){
                        $(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
                        $(".modal-footer, .modal-header > span").empty();
                    });
                });

                $("#modal-header > .panel-body > button").each(function(){
                    var cls = $(this).data('class');
                    $(this).click(function(){
                        $(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
                        $(".modal-footer, .modal-header > span").empty();
                        $(".modal-header > span").removeClass().addClass('text-size-20').append('Modal Title');
                    });
                });

                $("#modal-footer > .panel-body > button").each(function(){
                    var cls = $(this).data('class');
                    $(this).click(function(){
                        $(".modal-dialog").removeClass('modal-default modal-primary modal-info modal-success modal-warning modal-danger').addClass(cls);
                        $(".modal-footer, .modal-header > span").empty();
                        $(".modal-footer").html("<button class='btn btn-default'>ini tombol!</button><button class='btn btn-default'>kembali</button>");
                    });
                });

                $(".btn-floyd").click(function(){
                    $("#gambar").attr('src','/ikan/'+$(this).attr('data-image'));
                });
			</script>
	</div>


@endsection
