@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noTelepon') ? ' has-error' : '' }}">
                            <label for="noTelepon" class="col-md-4 control-label">No. Telepon</label>

                            <div class="col-md-6">
                                <input id="noTelepon" type="text" class="form-control" name="noTelepon" value="{{ old('noTelepon') }}" required autofocus>

                                @if ($errors->has('noTelepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noTelepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('provinces') ? ' has-error' : '' }}">
                            <label for="provinces" class="col-md-4 control-label">Provinsi</label>
                            <div class="col-md-6">
                                <select name="provinces" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $prov )
                                        <option value="{{ $prov->id }}"> {{ $prov->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('regencies') ? ' has-error' : '' }}">
                            <label for="regencies" class="col-md-4 control-label">Kabupaten</label>
                            <div class="col-md-4">
                                <select name="regencies" class="form-control">
                                    <option>Pilih Kab/Kota</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('districts') ? ' has-error' : '' }}">
                            <label for="districts" class="col-md-4 control-label">Kecamatan</label>
                            <div class="col-md-4">
                                <select name="districts" class="form-control">
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('villages') ? ' has-error' : '' }}">
                            <label for="villages" class="col-md-4 control-label">Kelurahan</label>
                            <div class="col-md-4">
                                <select name="villages" class="form-control">
                                    <option>Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('noRek') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Nomor Rekening</label>

                          <div class="col-md-6">
                               <input type="text" class="form-control" name="noRek" value="{{ old('noRek') }}">

                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>


                        <div class="form-group{{$errors->has ('level') ? 'has-error':''}}">
                            <label class="col-md-4 control-label">Sebagai</label>

                        <div class="col-md-6">
                            <select name="level" class="form-control">
                                <option value="1">Agen</option>
                                <option value="2">Pengusaha</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
    @endsection
