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
							<h3 class="panel-title">Beli Penawaran Ikan</h3>

						</div>
						<div class="panel-body">
							<form action="/lanjutBeli" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
								{{ csrf_field() }}

								<div class="form-group">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-6">
										<span><img id="foto" src="/ikan/{{$beli->fotoIkan}}" class="img-responsive" width="300px" height="300px" align=center></span>
									</div>
								</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">ID Penawaran</label>
										<div class="col-sm-6">
											<input type="text" placeholder="Placeholder text" readonly="readonly" class="form-control" name="id" value="{{$beli->idIkan}}" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Tanggal Penawaran</label>
										<div class="col-sm-6">
											<input type="date" placeholder="Placeholder text" class="form-control" name="tanggalPenawaran" value="{{$beli->tanggalPenawaran}}" readonly="readonly" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Ikan</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="opsiIkan" value="{{$beli->jenis_ikan->jenisIkan}}" readonly="readonly" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ikan</label>
										<div class="col-sm-6">
											<input type="text" readonly="readonly" class="form-control" name="namaIkan" value="{{$beli->namaIkan}}" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Pembeli</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" readonly="readonly" name="user" value="{{ Auth::user()->name }}" required>
											<input type="hidden" class="form-control" readonly="readonly" name="user1" value="{{ Auth::user()->id }}" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Agen</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" readonly="readonly" name="agen" value="{{ $beli->pemilik->name}}" required>
											<input type="hidden" class="form-control" readonly="readonly" name="agen1" value="{{ $beli->pemilik->id }}" required>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Jumlah Ikan(kg)</label>
										<div class="col-sm-6">
											<input type="text" placeholder="kg"  class="form-control" name="jumlahIkan" value="{{$beli->jumlahIkan}}" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Harga Ikan (Rp)</label>
										<div class="col-sm-6">
											<input type="text" placeholder="Rp" class="form-control"  name="hargaIkan" value="{{$beli->hargaIkan}}" required>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-9" align="right">
											<br>
											<br>
											<div class="form-group">
												<div class="col-sm-9" align="right">
													<button class="btn btn-success" type="submit" value="beli" name="submit">Beli</button>
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
