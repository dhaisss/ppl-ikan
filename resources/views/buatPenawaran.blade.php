
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
									<h3 class="panel-title">Data Penawaran Ikan</h3>
									  <span class="text-grey">oleh {{ Auth::user()->name }}</span>
								</div>
								<div class="panel-body">
									<form enctype="multipart/form-data" action="/insertPenawaran/" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
										{{ csrf_field() }}

										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="col-sm-5">
												<span><img id="foto" src="/ikan/fish.png" class="img-responsive" width="300px" height="300px"></span>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Ubah Foto</label>
											<div class="col-sm-9">
												<input class="filestyle" id="inpfoto" name="foto" type="file">
											</div>
										</div>


											<div class="form-group">
											<div class="col-sm-6">
												<input type="hidden"  class="form-control" name="agen"  value="{{ Auth::user()->id }}" required>
											</div>
											</div>

                      <div class="form-group">
                      <label class="col-sm-3 control-label">Kategori Ikan</label>
                      <div class="col-sm-6">
                         <select name="kategoriIkan" class="form-control">
                                           <option value="1">Ikan Segar</option>
                                          <option value="2">Ikan Tidak Segar</option>
                                      </select>
                                      </div>
                      </div>

											<div class="form-group">
											<label class="col-sm-3 control-label">Jenis Ikan</label>
											<div class="col-sm-6">
												 <select name="jenisIkan" class="form-control">
        	                       					 <option value="1">ikan Tawar</option>
    	                            				<option value="2">ikan Laut</option>
	                            				</select>
	                            				</div>
											</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Ikan</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="namaIkan" placeholder="contoh: Nila, Gurami, Tongkol" required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Jumlah Ikan (kg)</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="jumlahIkan" placeholder="Jumlah Ikan" required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Harga Ikan (kg)</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="hargaIkan" placeholder="Harga Ikan" required>
											</div>
										</div>

										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
											<div class="col-sm-9" align="right">
												<button class="btn btn-success" type="submit">Kirim Penawaran</button>
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
