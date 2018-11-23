@extends('layouts.sidebarAgen')

@section('content')

<div id="main-panel" style="margin-left: 300px">
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
	<div id="content" style="margin-top: 50px">
		<div class="container-fluid">
			<!-- basic form -->

			<!-- Basic element -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default" >
						<div class="panel-heading">
							<h3 class="panel-title">Data Penawaran Ikan</h3>
							<span class="text-grey">oleh {{ Auth::user()->name }}</span>
						</div>
						<div class="panel-body">
							<form enctype="multipart/form-data" action="/updatePenawaran/{{$edit->idIkan}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-3 control-label"></label>
									<div class="col-sm-6">
										<img id="foto" src="/ikan/{{$edit->fotoIkan}}" class="img-responsive" width="300px"  align=center>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Ubah Foto</label>
									<div class="col-sm-9">
										<input class="filestyle" id="inpfoto" name="foto" type="file">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Jenis Ikan</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="jenisIkan" value="{{$edit->jenis_ikan->jenisIkan}}" readonly="readonly" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Kategori Ikan</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="kategoriIkan" value="{{$edit->kategori->kategori}}" readonly="readonly" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Nama Ikan</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="nama" value="{{$edit->namaIkan}}" readonly="readonly" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Jumlah Ikan(kg)</label>
									<div class="col-sm-6">
										<input type="text" placeholder="kg" class="form-control" name="jumlah" value="{{$edit->jumlahIkan}}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Harga Ikan (Rp)</label>
									<div class="col-sm-6">
										<input type="text" placeholder="Rp" class="form-control"  name="harga" value="{{$edit->hargaIkan}}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Status Penawaran</label>
									<div class="col-sm-6">
										<select name="status" class="form-control"  >
											<option value="1">ditawarkan</option>
											<option value="2">terjual</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-9" align="right">
										<br>
										<br>
										<div class="form-group">
											<div class="col-sm-9" align="right">
												<button class="btn btn-success" type="submit" value="edit" name="submit">Perbarui</button>
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
<script src="{{ asset('js/app.js') }}"></script>
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inpfoto").change(function () {

        readURL(this);
    });

</script>
@endsection
