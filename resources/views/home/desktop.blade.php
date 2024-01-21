<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
	<style>
		.slider-container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        img {
            width: 200px;
            height: auto;
            margin-left: 30px;
            margin-right: 30px;
            margin-top: 30px;
            border: #1d1d1d solid 4px;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
			border: #1d1d1d solid 2px;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
			border: #1d1d1d solid 2px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .ready{
            width: 120%;
        }
    </style>
	<title>Document</title>
</head>
<body>
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">
							<img class="navbar-brand brand-logo-mini" src="{{asset('assets/images/MARHAS.svg')}}" alt="">
							<div role="grup" class="btn-grup float-right">
								<a href="/login" class="btn btn-outline-primary">Sign In<i class="icon icon-login"></i></a>
								<a href="/login" class="btn btn-outline-info">Sign Up<i class="icon icon-login"></i></a>
							</div>
						</h2>
					</div>
					<div class="card-body">
						<h2>Dijual :</h2>
						<center>
							<div class="slider-container">
								<div class="slider">
									@foreach ($produk as $p)
									<div class="slide">
										{{-- <img height="auto" width="100%" src="{{asset('assets/images/emty.svg')}}" alt="no produck to show"> --}}
										<img height="auto" width="100px" height="auto" src="{{asset("image/produk/$p->foto")}}" alt="produck"><br>
                                        {{$p->nama}}
										{{-- @if ($produk->foto === null)
											<img height="auto" width="100%" src="{{asset('assets/images/emty.svg')}}" alt="no produck to show">
										@else
											<img height="auto" width="100%" src="{{asset('image/produk/$produk->foto')}}" alt="produck">
										@endif --}}
									</div>
									@endforeach
									<!-- Tambahkan slide sesuai kebutuhan -->
								</div>
							</div>
							<a class="btn btn-color-primary" onclick="prevSlide()"><i class="icon-arrow-left text-primary"></i></a>
							<a class="btn btn-color-primary" onclick="nextSlide()"><i class="icon-arrow-right text-primary"></i></a>
						</center>
				</div>
			</div>
		</div>
	</div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
                    <div class="card-body bg-dark">
                        <h2 class="card-tittle text-light">
                            Menyediakan :
                        </h4>
                        <center>
                        <img  width="200px" height="200px" src="{{asset("assets/images/desktop/1.svg")}}" alt="produck">
                        <img  width="200px" height="200px" src="{{asset("assets/images/desktop/2.svg")}}" alt="produck">
                        <img  width="200px" height="200px" src="{{asset("assets/images/desktop/3.svg")}}" alt="produck">
                        <img  width="200px" height="200px" src="{{asset("assets/images/desktop/4.svg")}}" alt="produck">
                        <img  width="200px" height="200px" src="{{asset("assets/images/desktop/5.svg")}}" alt="produck">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script>
    let currentIndex = 0;

    function showSlide(index) {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }

        const translateValue = -currentIndex * 100 + '%';
        slider.style.transform = 'translateX(' + translateValue + ')';
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }
</script>
</html>