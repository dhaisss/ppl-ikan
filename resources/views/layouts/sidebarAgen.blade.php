<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/plugins/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-floyd.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/theme-helper.css')}}">
	<style>
            html, body {
                background: url("bg/WALLPAPER 1.jpg");
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            </style>
</head>

<body>
	<div id="wrapper">
		<div id="sidebar">
			<div id="sidebar-wrapper">
				<div class="sidebar-title">

				</div>
				<div class="sidebar-avatar">

					<div class="sidebar-avatar-text">  {{ Auth::user()->name }}  </div>
				</div>
				<ul class="sidebar-nav">

				 	<li><a href="{{ url('/dashboardAgen') }}"> <span>Dashboard</span></a></li>

					<li><a href="{{ url('/profilAgen/'.Auth::user()->id) }}"> <span>Profil</span></a></li>

					<li><a href="{{ url('/daftarPengusaha') }}"> <span>Daftar Pengusaha</span></a></li>

					<li><a href="{{ url('/buatPenawaran') }}"> <span>Buat Penawaran Ikan</span></a></li>

					<li><a href="{{ url('/daftarPenawaran/'.Auth::user()->id) }}"><span>Daftar Penawaran </span></a></li>

					<li><a href="{{ url('/notifikasiAgen/'.Auth::user()->id) }}"><span>Notifikasi</span></a></li>

					<li><a href="{{ url('/transaksiAgen/'.Auth::user()->id) }}"><span>Transaksi</span></a></li>

					<li><a href="{{ route('logout') }}"
							onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
						<span>Logout</span>
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
					</form>
				</li>

					</ul>
				<div class="sidebar-footer">
					<hr style="border-color: #DDD">
					</a><br>
				</div>
				<div class="sidebar-avatar-image"></div><br>
			</div>
		</div>

			@yield('content')
	</div>
</body>
<script src="{{url('assets/plugins/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/theme-floyd.js')}}"></script>
</html>
