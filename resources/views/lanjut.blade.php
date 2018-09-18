@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>


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
							<h3 class="panel-title">Konfirmasi Pembelian</h3>
							<span class="text-grey">oleh {{ Auth::user()->name }}</span>
						</div>

<!-- Error -->
<div class="panel-body">
  <form action="/konfirmTransaksi/{{$edit->idTransaksi}}"  enctype="multipart/form-data"  method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
    {{ csrf_field() }}

    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal Beli</label>
      <div class="col-sm-6">
        <input type="date"  class="form-control" name="tanggal" value="{{$edit->tanggalBeli}}" readonly="readonly" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">ID Penawaran</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="idPenawaran" value="{{$edit->idTransaksi}}" readonly="readonly" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Agen</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="pengusaha" value="{{$edit->transaksi->pemilik->name}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Nama ikan</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="namaIkan" value="{{$edit->transaksi->namaIkan}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Jumlah (kg)</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="jumlahIkan" value="{{$edit->jumlahIkan}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Harga</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="jumlahIkan" value="{{$edit->hargaIkan}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Ongkos kirim</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="ongkir" value="{{$edit->ongkir}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">No. Rekening</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="rekening" value="602122123212" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Atas Nama</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="rekening" value="Muhammad Dhais Firmansyah" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Total</label>
      <div class="col-sm-6">
        <input type="text" readonly="readonly" class="form-control" name="total" value="{{$total}}" required>
      </div>
    </div>

      <div class="form-group">
      <label class="col-sm-3 control-label">Bukti transfer</label>
      <div class="col-sm-6" style="border: none;">
        <!-- <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" /> -->
        <input type="file"  class="form-control" name="bukti"   required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-9" align="right">
        <br>
        <br>
        <div class="form-group">
          <div class="col-sm-9" align="right">
            <button class="btn btn-success" type="submit" value="edit" name="submit">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>







<!-- Error -->


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
