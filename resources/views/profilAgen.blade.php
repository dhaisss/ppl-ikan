@extends('layouts.sidebarAgen')

@section('content')
<main class="pt-5 mx-lg-5">
	<div class="container-fluid mt-5">
	<div id="main-panel">
		<div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home</a>
                        <span>/</span>
                        <span>Profil</span>
                    </h4>
                </div>

            </div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-body">
				<div class="panel panel-default" style="margin-left: 30px">
					<div class="panel-heading">
						<h3 class="panel-title">Profil {{ Auth::user()->name }}</h3>

					</div>
					<div class="panel-body">
						<form enctype="multipart/form-data" action="/updateProfil/{{Auth::user()->id}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
							{{ csrf_field() }}

							<div class="form-group">
								<label class="col-sm-4 control-label"></label>
								<div class="col-sm-6">
									<span><img id="foto" src="/profil/{{Auth::user()->foto}}" width="200px" height="250px" align=center></span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Ubah Foto</label>
								<div class="col-sm-9">
									<input class="filestyle" id="inpfoto" name="foto" type="file">
								</div>
							</div>

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
									<input type="text" readonly="readonly"  name="email" value=" {{ Auth::user()->email }}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nomor Telepon</label>
								<div class="col-sm-6">
									<input type="text"  name="noTelepon" value=" {{ Auth::user()->noTelepon}}" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-6">
									<input type="text"  name="alamat" value=" {{ Auth::user()->alamat}}" class="form-control">
								</div>
							</div>

							<div class="form-group{{ $errors->has('provinces') ? ' has-error' : '' }}">
								<label for="provinces" class="col-sm-3 control-label">Provinsi</label>
								<div class="col-sm-6">
									<select name="provinces" class="form-control">
										<option value="">{{Auth::user()->desa->districts->regencies->provinces->name}}</option>
										@foreach ($provinces as $prov )
											<option value="{{ $prov->id }}"> {{ $prov->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group{{ $errors->has('regencies') ? ' has-error' : '' }}">
								<label for="regencies" class="col-sm-3 control-label">Kabupaten</label>
								<div class="col-sm-6">
									<select name="regencies" class="form-control">
										<option>{{Auth::user()->desa->districts->regencies->name}}</option>
									</select>
								</div>
							</div>

							<div class="form-group{{ $errors->has('districts') ? ' has-error' : '' }}">
								<label for="districts" class="col-sm-3 control-label">Kecamatan</label>
								<div class="col-sm-6">
									<select name="districts" class="form-control">
										<option>{{Auth::user()->desa->districts->name}}</option>
									</select>
								</div>
							</div>

							<div class="form-group{{ $errors->has('villages') ? ' has-error' : '' }}">
								<label for="villages" class="col-sm-3 control-label">Kelurahan</label>
								<div class="col-sm-6">
									<select name="villages" class="form-control">
										<option>{{Auth::user()->desa->name}}</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">no. Rekening</label>
								<div class="col-sm-6">
									<input type="text"  name="noRek" value=" {{ Auth::user()->noRek}}" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-9" align="center">
									<button class="btn btn-success" type="submit">Ubah Profil</button>
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
@endsection
@section('script')

	<script>
        $(document).ready(function() {

            $('select[name="provinces"]').on('change', function(){
                var provinces_id = $(this).val();
                if(provinces_id) {
                    $.ajax({
                        url: '/regencies/get/'+provinces_id,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {

                            $('select[name="regencies"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="regencies"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="regencies"]').empty();
                }

            });

        });
	</script>
	<script>
        $(document).ready(function() {

            $('select[name="regencies"]').on('change', function(){
                var regency_id = $(this).val();
                if(regency_id) {
                    $.ajax({
                        url: '/districts/get/'+regency_id,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {

                            $('select[name="districts"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="districts"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="districts"]').empty();
                }

            });

        });
	</script>
	<script>
        $(document).ready(function() {

            $('select[name="districts"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: '/villages/get/'+district_id,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {

                            $('select[name="villages"]').empty();

                            $.each(data, function(key, value){

                                $('select[name="villages"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="villages"]').empty();
                }

            });

        });
	</script>

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




