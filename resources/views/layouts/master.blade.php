
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Penjualan Produk PKK</title>
    <!-- plugins:css --> 
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/chartist/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/datatable/dataTables.bootstrap4.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="index.html">
                    <img src="{{asset('assets/images/MARHAS.svg')}}"  width="150px" alt=""  />
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo_MMart.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                <ul class="navbar-nav navbar-nav-right ml-auto">
                    <form action="/produk/cari" method="post">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-secondary text-white"><i class="icon-basket"></i></span>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Cari Produk" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <button class="btn-sm btn-primary" type="submit"><i class="icon-magnifier"></i></button>
                            </div>
                        </div>
                    </form>
                    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle ml-2" src="{{asset('image/user/'.Auth()->User()->foto)}}" alt="Profile image"> <span class="font-weight-normal">{{Auth()->User()->nama}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{asset('image/user/'.Auth()->User()->foto)}}" width="50px" alt="Profile image">
                                <p class="mb-1 mt-3">{{Auth()->User()->nama}}</p>
                                <p class="font-weight-light text-muted mb-0">{{Auth()->User()->username}}</p>
                            </div>
                            <a class="dropdown-item" href="/user/{{Auth()->User()->id}}/profile"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>

                            @can('seller')
                            <a class="dropdown-item" href="/user/{{Auth()->User()->id}}/history"><i class="dropdown-item-icon icon-clock text-primary"></i>History</a>
                            @endcan
                            {{-- @can('customer') --}}
                            <a class="dropdown-item" href="/user/keranjang/{{Auth()->User()->id}}"><i class="dropdown-item-icon icon-basket text-primary"></i>Keranjang</a>
                            {{-- @endcan --}}
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <!-- Start:Sidebar -->
            @include('layouts.sidebar')
            <!-- End:Sidebar -->
            <!-- partial -->
            <div class="main-panel">
                <!-- Start:Content -->
                @yield('content')
                <!-- End:Content -->
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/vendors/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatable/datatables.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable();
        })
    </script>

    <!-- Start:Pesan Berhasil -->
    <!-- <script>
        Swal.fire('Berhasil', 'Data berhasil ...', 'success');
    </script> -->
    <!-- End:Pesan Berhasil -->

    <!-- Start:Pesan Gagal -->
    <!-- <script>
        Swal.fire('Gagal', 'Data gagal ...', 'error');
    </script> -->
    <!-- End:Pesan Gagal -->

    <!-- Start:Pesan Konfirmasi Hapus -->
    <script>
        function Delete(url) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                dangerMode: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            })
        }
    </script>
    <!-- End:Pesan Konfirmasi Hapus -->
    <!-- End custom js for this page -->
</body>

</html>