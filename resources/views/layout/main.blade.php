<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIMK | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="{{ asset('js/scripts.js') }}"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-info">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/"><img src="{{ asset('assets/img/logo.png') }}" alt=""
                width="40" height="40"> Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class='bx bx-menu'></i>
        </button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon">
                                <i class='bx bxs-dashboard'></i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#databbm"
                            aria-expanded="false" aria-controls="databbm">
                            <div class="sb-nav-link-icon"><i class='bx bxs-gas-pump'></i></div>
                            Data BBM
                            <div class="sb-sidenav-collapse-arrow">
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </a>
                        <div class="collapse" id="databbm" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/stok_bbm">Stok BBM</a>
                                <a class="nav-link" href="/masuk">Tambah Stok BBM</a>
                                <a class="nav-link" href="/keluar">Pengeluaran BBM</a>
                            </nav>
                        </div>
                        <a href="" class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#kendaraan">
                            <div class="sb-nav-link-icon"><i class='bx bxs-car'></i></div>
                            Data Kendaraan
                            <div class="sb-sidenav-collapse-arrow"><i class='bx bxs-chevron-down'></i></div>
                        </a>
                        <div class="collapse" id="kendaraan" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a href="/kendaraan" class="nav-link">Kendaraan</a>
                                <a href="/pajak" class="nav-link">Info Pajak</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="/surat_tugas">
                            <div class="sb-nav-link-icon"><i class='bx bx-envelope'></i></div>
                            Surat Tugas
                        </a>
                        <a href="/logout" class="nav-link">
                            <div class="sb-nav-link-icon"><i class='bx bx-log-out bx-flip-horizontal'></i></div>
                            Keluar
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Gilang Risky Mahardika 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
