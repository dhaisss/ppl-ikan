
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
									<h3 class="panel-title"> Notifikasi Pembelian </h3>

									<div class="panel-body table-responsive table-full">
									<table class="table table-stripped table-bordered">

									<tr>
											<td class="text-center text-nowrap">ID Penawaran</td>
											<td class="text-center text-nowrap">Tanggal Beli</td>
                      <td class="text-center text-nowrap">Nama Ikan</td>
                      <td class="text-center text-nowrap">Jumlah Ikan</td>
											<td class="text-center text-nowrap">Pengusaha</td>
											<td class="text-center text-nowrap">Total Harga</td>
											<td class="text-center text-nowrap">Action</td>
										</tr>


										@foreach($tampils as $data)
										<tr>
											<td class="text-center text-nowrap">{{$data->idTransaksi}}</td>
											<td class="text-center text-nowrap">{{$data->tanggalBeli}}</td>
                      <td class="text-center text-nowrap">{{$data->transaksi->namaIkan}}</td>
											<td class="text-center text-nowrap">{{$jumlah}}</td>
                      <td class="text-center text-nowrap">{{$data->pembeli_ikan->name}}</td>
											<td class="text-center text-nowrap">{{$total}}</td>
											 <td class="text-center text-nowrap">
								  		 <button type="button" class="btn btn-floyd" data-toggle="modal" data-target="#myModal" data-class="modal-default">Lihat</button>&nbsp
										  	<a href="/verifikasi/{{$data->idTransaksi}}"><button type="submit" class="btn btn-success"> <font color="white">Setujui</font></button></a>

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
				<?php if ($data==null): ?>

				<?php else: ?>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span></span>
	</div>
	<div class="modal-body">
		<p class="text-center">
			<span class="text-size-24">Bukti Transfer</span><br>
			<img src=" {{ asset('image/'.$data->buktiTransfer) }} "><br><br>

		</p>
	</div>
	<div class="modal-footer"></div>
	</div>
	</div>
	</div>
				<?php endif; ?>

			</div>
<?php if ($data==null): ?>

<?php else: ?>
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
</script>
<?php endif; ?>


		</div>
		@endsection
