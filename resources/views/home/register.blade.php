<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body{
            background: #e9e5e5;
        }
        .border{
            border: #1d1d1d 4px solid;
            height: auto;
            width: 510px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-top: 50px;
        }
        .header{
            background: #38E54D ;
            border-bottom: #1d1d1d 2px solid; 
            height: auto;
        }
        .body{
            padding: 20px 20px 20px 20px;
            background: #fff;
        }
        .footer{
            border-top: #1d1d1d 2px solid;
            border-bottom: #2d2c2c28 solid;
            background: #2d2c2c28;
            height: 100%;
            width: 100%;
        }
        .mb3{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .form-control{
            border: #4d4747 solid 2px;
            border-radius: 10px;
            height: 35px;
            width: 100%;
            font-size: 20px;
            color: #1d1d1d;
        }
        .tombol {
    display: flex;
    width: 380px;
    gap: 10px;
    --b: 5px;   /* the border thickness */
    --h: 1.8em; /* the height */
    margin: 40px;
  }
  
  .tombol .tombol-dalem {
    --_c: #88C100;
    flex: calc(1.25 + var(--_s,0));
    min-width: 0;
    font-size: 40px;
    font-weight: bold;
    height: var(--h);
    cursor: pointer;
    color: var(--_c);
    border: var(--b) solid var(--_c);
    background: 
      conic-gradient(at calc(100% - 1.3*var(--b)) 0,var(--_c) 209deg, #0000 211deg) 
      border-box;
    clip-path: polygon(0 0,100% 0,calc(100% - 0.577*var(--h)) 100%,0 100%);
    padding: 0 calc(0.288*var(--h)) 0 0;
    margin: 0 calc(-0.288*var(--h)) 0 0;
    box-sizing: border-box;
    transition: flex .4s;
  }
  .tombol .tombol-dalem + .tombol-dalem {
    --_c: #FF003C;
    flex: calc(.75 + var(--_s,0));
    background: 
      conic-gradient(from -90deg at calc(1.3*var(--b)) 100%,var(--_c) 119deg, #0000 121deg) 
      border-box;
    clip-path: polygon(calc(0.577*var(--h)) 0,100% 0,100% 100%,0 100%);
    margin: 0 0 0 calc(-0.288*var(--h));
    padding: 0 0 0 calc(0.288*var(--h));
  }
  .tombol .tombol-dalem:focus-visible {
    outline-offset: calc(-2*var(--b));
    outline: calc(var(--b)/2) solid #000;
    background: none;
    clip-path: none;
    margin: 0;
    padding: 0;
  }
  .tombol .tombol-dalem:focus-visible + a {
    background: none;
    clip-path: none;
    margin: 0;
    padding: 0;
  }
  .tombol .tombol-dalem:has(+ .tombol-dalem:focus-visible) {
    background: none;
    clip-path: none;
    margin: 0;
    padding: 0;
  }
  .tombol-dalem:hover,
  .tombol-dalem:active:not(:focus-visible) {
    --_s: .75;
  }
  .tombol-dalem:active {
    box-shadow: inset 0 0 0 100vmax var(--_c);
    color: #fff;
  }

  .btn-submit{
    background: green;
    color: #1d1d1d;
    border: #000 2px solid;
    font-size: 30px;
    border-radius: 10px;
    transition-duration: 0.5s;
  }
  .btn-submit:hover{
    background: #fff;
    color: #6e6868;
  }
  .btn-reset{
    background: yellow;
    color: #1d1d1d;
    border: #000 2px solid;
    font-size: 30px;
    border-radius: 10px;
    transition-duration: 0.5s;
  }
  .btn-reset:hover{
    background: #fff;
    color: #6e6868;
  }
    </style>
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
    <div class="border">
        <div class="header">
            <center><b><h1>Marhas Mart</h1></b></center>
        </div>
        <div class="body">
            <form enctype="multipart/form-data" action="/register/store" method="post">
              @csrf
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    name="nama"
                    id=""
                    aria-describedby="helpId"
                    placeholder="nama"/>
                </div>
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="username"
                        id=""
                        aria-describedby="helpId"
                        placeholder="USERNAME"/>
                </div>
                <div class="mb-3">
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id=""
                        aria-describedby="helpId"
                        placeholder="PASSWORD"/>
                </div>
                <div class="mb-3">
                  <input
                      type="text"
                      class="form-control"
                      name="no_telp"
                      id=""
                      aria-describedby="helpId"
                      placeholder="Nomor Telepon"/>
                </div>
                <div class="mb-3">
                  <textarea class="form-control" name="alamat" placeholder="ALAMAT" id="" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-label" for="exampleSelectGender">Level</label>
                 <select class="form-control" name="level" id="">
                  <option value="seller">Seller</option>
                  <option value="customer">Customer</option>
                 </select>
                 <div class="mb-3">
                  <label for="" class="form-label">Pas Foto</label>
                  <input
                      type="file"
                      class="form-control"
                      name="foto"
                      id=""
                      placeholder="insert your p"
                      aria-describedby="fileHelpId"
                  />
                  <div id="fileHelpId" class="form-text"></div>
                 </div>
                  </div>
                    <button class="btn btn-success" type="submit">SUBMIT</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
            </form>
        </div>
        <div class="footer">
            <center>
                <div class="tombol">
                  <a class="tombol-dalem" href="/login">Login</a>
                  <a class="tombol-dalem" href="/">Back</a>
                </div>
            </center>
        </div>
    </div>
    <!-- Start:Pesan Gagal -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    {{-- <script>
        Swal.fire('Gagal', 'Username atau Password Gagal', 'error');
    </script>  --}}
    <!-- End:Pesan Gagal -->
</body>
</html>