<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:image" content="{{asset('logo/logo-sisampah.svg')}}">
    <title>AUTH FORGOT PASSWORD - APLIKASI SiSampah</title>
    <link rel="icon" type="image/png" href="{{asset('logo/logo-sisampah.svg')}}">
    <!-- Favicon icon -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('home.css')}}" rel="stylesheet">
    
</head>

<body class="h-100">
    <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
      <meta content="{{asset('logo/logo-sisampah.svg')}}" itemprop="url"/> </div>
      <div id="preloader">
        <div class="loader">
            <center>Mohon menunggu ...</center>
        </div>
    </div>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto mt-5">
        <div class="card card0 border-0">
            <form action="{{route('proses_forgot')}}" method="post">
                @csrf
                <div class="row d-flex">
                    <div class="col-lg-6" style="background-image: url('{{asset('forgot.gif')}}');background-size: 100% 100%">

                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h6 class="mb-0 mr-4 mt-2">LUPA PASSWORD</h6>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div>
                                <small class="or text-center">AUTH LUPA PASSWORD</small>
                                <div class="line"></div>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Email</h6></label>
                                <input class="mb-4" type="email" autocomplete="off" name="email" placeholder="Masukkan Email anda">
                            </div>
                            <div class="row mb-3 px-3">
                                <button name="login" class="btn btn-blue text-center">Kirim Kode</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(!empty(session('kodeverif')))
    <div class="modal fade text-left" id="mymodal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Masukkan Kode Verfikasi</h5>
                <button type="button" class="close rounded-pill"
                data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('cek_verifikasi')}}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Kode Verfikasi</label>
                            <input type="text" class="form-control" autocomplete="off" autofocus="" name="token">
                        </div>  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button name="ubah" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endif
@if(!empty(session('pss')))
<div class="modal fade text-left" id="mymodal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Ubah Password</h5>
            <button type="button" class="close rounded-pill"
            data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{route('ubah_password')}}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="text" class="form-control" autocomplete="off" name="password">
                    </div>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button onclick="return confirm('Lanjut untuk merubah password?')" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Accept</span>
            </button>
        </div>
    </form>
    @endif
    <script src="{{asset('template/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('template/js/custom.min.js')}}"></script>
    <script src="{{asset('template/js/settings.js')}}"></script>
    <script src="{{asset('template/js/gleek.js')}}"></script>
    <script src="{{asset('template/js/styleSwitcher.js')}}"></script>
    <script src="{{asset('template/plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('template/plugins/toastr/js/toastr.init.js')}}"></script>
    <script src="{{asset('template/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('template/plugins/sweetalert/js/sweetalert.init.js')}}"></script><script type="text/javascript">
        $(document).ready(function() {
            $("#mymodal").modal('show');
        })
    </script>
</body>
@if(session('salah'))
<script type="text/javascript">
    sweetAlert({
        title: "Verifikasi Gagal",
        text: "Email tidak sesuai",
        type: "error",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    });
</script>
@endif
@if(session('benar'))
<script type="text/javascript">
    toastr.success("Verifikasi Success","Masukkan Kode Verfikasi",
    {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    })
</script>
@endif
@if(session('tokensalah'))
<script type="text/javascript">
    toastr.error("Token Gagal","Kode Verfikasi anda tidak sesuai",
    {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    })
</script>
@endif
@if(session('tokenbenar'))
<script type="text/javascript">
    toastr.success("Kode Verifikasi Success","Masukkan Password baru Anda ..",
    {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    })
</script>
@endif
</html>
