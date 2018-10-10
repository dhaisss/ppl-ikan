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
							<h3 class="panel-title">Tolak Pembelian</h3
						</div>
						<div class="panel-body">
							<form action="/updateTolakTransaksi/{{$edit->idTransaksi}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
								{{ csrf_field() }}

								<div class="form-group">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-6">
										<span><img id="foto" src="/ikan/{{$edit->transaksi->fotoIkan}}" class="img-responsive" width="300px" height="300px" align=center></span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Tanggal Beli</label>
									<div class="col-sm-6">
										<input type="date" placeholder="Placeholder text" class="form-control" name="tanggalBeli" value="{{$edit->tanggalBeli}}" readonly="readonly" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Tanggal Penawaran</label>
									<div class="col-sm-6">
										<input type="date" placeholder="Placeholder text" class="form-control" name="tanggalPenawaran" value="{{$edit->transaksi->tanggalPenawaran}}" readonly="readonly" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Pengusaha</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="pengusaha" value="{{$edit->pembeli_ikan->name}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Alamat Pengusaha</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="alamat" value="{{$edit->pembeli_ikan->alamat}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Kecamatan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="alamat" value="{{$edit->pembeli_ikan->kecamatan}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Kabupaten</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="alamat" value="{{$edit->pembeli_ikan->kabupaten}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Provinsi</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="alamat" value="{{$edit->pembeli_ikan->provinsi}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Kategori Ikan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="jenisIkan" value="{{$edit->transaksi->kategori->kategori}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Jenis Ikan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="jenisIkan" value="{{$edit->transaksi->jenis_ikan->jenisIkan}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Ikan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="namaIkan" value="{{$edit->transaksi->namaIkan}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Jumlah Ikan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="jumlahIkan" value="{{$edit->transaksi->jumlahIkan}}" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Harga Ikan</label>
									<div class="col-sm-6">
										<input type="text" readonly="readonly" class="form-control" name="hargaIkan" value="{{$edit->hargaIkan}}" required>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-9" align="right">
										<br>
										<br>
										<div class="form-group">
											<div class="col-sm-9" align="right">
												<button class="btn btn-danger" type="submit" value="edit" name="submit">Tolak Transaksi</button>
											</div>
										</div>
							 		</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
