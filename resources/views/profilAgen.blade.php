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
							<a class="navbar-brand text-size-24" href="#"><i class="fa fa-home"></i> Profil</a>
							</div>
					</div>
				</nav>
			</div>
			<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Profil {{ Auth::user()->name }}</h3>

								</div>
								<div class="panel-body">
									<form action="/updateProfil/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
										 {{ csrf_field() }}
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Lengkap</label>
											<div class="col-sm-6">
												<input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Sebagai</label>
											<div class="col-sm-6">
												<input type="text" readonly="readonly"  value="{{ Auth::user()->lev->level }} " class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">E-mail</label>
											<div class="col-sm-6">
												<input type="text"  name="email" value=" {{ Auth::user()->email }}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Alamat</label>
											<div class="col-sm-6">
												<input type="text"  name="alamat" value=" {{ Auth::user()->alamat}}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Kecamatan</label>
											<div class="col-sm-6">
												<input type="text"  name="kecamatan" value=" {{ Auth::user()->kecamatan}}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Kabupaten</label>
											<div class="col-sm-6">
												<input type="text"  name="kabupaten" value=" {{ Auth::user()->kabupaten}}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Provinsi</label>
											<div class="col-sm-6">
												<input type="text"  name="provinsi" value=" {{ Auth::user()->provinsi}}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">no. Rekening</label>
											<div class="col-sm-6">
												<input type="text"  name="noRek" value=" {{ Auth::user()->noRek}}" class="form-control">
											</div>
										</div>

										 <div class="form-group">
											<div class="col-sm-9" align="right">
												<button class="btn btn-success" type="submit">Ubah Profil</button>
											</div>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>
	</div>
</body>
<script src="assets/plugins/jquery/jquery-3.1.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme-floyd.js"></script>
</html>
