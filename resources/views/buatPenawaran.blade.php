
@extends('layouts.sidebarAgen')

@section('content')
<main class="pt-5 mx-lg-5">
<div class="container-fluid mt-5">
<div id="main-panel" >
			<div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <span>Penawaran Ikan</span>
                    </h4>
                </div>

            </div>
					<!-- basic form -->

					<!-- Basic element -->
					<div class="row">
						<div class="col-md-12">
							<div class="card card-body">
							<div class="panel panel-default" style="margin-left: 30px">
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
											<label class="col-sm-3 control-label">Masukkan Foto</label>
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
											<div class="col-sm-9" align="center">
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
</main>
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
