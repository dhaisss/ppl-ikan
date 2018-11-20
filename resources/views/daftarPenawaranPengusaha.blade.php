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
                        <span>Daftar Penawaran Ikan</span>
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
									<h3 class="panel-title">Penawaran Ikan</h3>
									  <span class="text-grey">Oleh agen penyedia ikan</span>
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
  											<td class="text-center text-nowrap">Agen</td>
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
  											<td class="text-center text-nowrap">{{$data->pemilik->name}}</td>
  											<td class="text-center text-nowrap">{{$data->status_penawaran->statusIkan}}</td>
												<td class="text-center text-nowrap">
													<button type="button" class="btn btn-floyd" data-image="{{$data->fotoIkan}}" data-toggle="modal" data-target="#myModal" data-class="modal-default" style="color: black">Lihat</button>&nbsp
										 		<a href="/beliPenawaran/{{$data->idIkan}}"><button type="Beli" class="btn btn-success"><i class="fa fa-fw fa-list-alt"></i><font color="white">Beli</font></button></a>
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
</main>
	<script src="assets/plugins/jquery/jquery-3.1.1.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/theme-floyd.js"></script>
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
