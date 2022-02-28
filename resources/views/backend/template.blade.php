<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
</head>

<body class="bg-light">
    <div class="wrapper d-flex">
        <div class="sidebar shadow">

            <div class="judul font-weight-bold">Panel PPDB</div>
            <div class="profil d-flex my-2">
                <div class="img">
                    <img src="{{ url('images/default-profile.jpg') }}" alt="" class="rounded-circle" width="55">
                </div>
                <div class="img-text">
                    <h6 class="font-weight-bold">{{ session('name') }}</h6>
                    <small>Online</small>
                </div>
            </div>
            <ul>
                <li><a href="{{ route('dashboard') }}"><span class="fa fa-home"></span> Dashboard</a></li>
                @if (session('level') == 2)
                    <li><a href="{{ route('biodata') }}"><span class="fa fa-user"></span> Biodata</a></li>
                    <li><a href="{{ route('raport') }}"><span class="fa fa-book"></span> Raport</a></li>
                @elseif(session('level') == 1)
                    <li><a href="{{ route('biodata') }}"><span class="fa fa-user"></span> Biodata</a></li>
                    <li><a href="{{ route('raport') }}"><span class="fa fa-book"></span> Raport</a></li>

                    <li>
                        <a href="#" class="btn-master"><span class="fa fa-user "></span> Master Data <span
                                class="fa fa-caret-down"></span></a>
                        <ul class="menu-master">
                            <li><a href="{{ route('dataBiodata') }}">Data Biodata</a></li>
                            <li><a href="{{ route('dataRaport') }}">Data Raport</a></li>
                            <li><a href="{{ route('dataKTM') }}">Data KTM</a></li>
                            <li><a href="{{ route('dataJurusan') }}">Data Jurusan</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('laporan') }}"><span class="fa fa-book"></span> Laporan Peserta</a></li>
                @endif



            </ul>

        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                <a href="#" class="navbar-brand font-weight-bold"><span class="fa fa-bars"></span></a>
                <button type="submit" class="navbar-toggler" data-toggle="collapse" data-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item">
                            <a href="{{ route('logout') }}"
                                class="nav-link text-white bg-danger rounded font-weight-bold">Logout</a>
                        </li>
                    </ul>
                </div>

            </nav>

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('datatables/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $('.btn-master').click(function() {
            $('.menu-master').toggleClass('show');
        });
        $('.navbar-brand').click(function() {
            $('.sidebar').toggleClass('resize');
        });
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>
</body>

</html>
