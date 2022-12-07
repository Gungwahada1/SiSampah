<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:image" content="{{asset('logo/logo-sisampah.svg')}}">
    <title>AUTH LOGIN - APLIKASI SiSampah</title>
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
            <div class="row d-flex">
                <div class="col-lg-6" style="background-image: url('{{asset('login.gif')}}');background-size: 100% 100%">

                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Login sesuai data anda</h6>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <small class="or text-center">AUTH LOGIN SiSampah APK</small>
                            <div class="line"></div>
                        </div>
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Email</h6></label>
                            <input class="mb-4" type="email" autocomplete="off" id="email" name="email" placeholder="Masukkan Email atau Username">
                        </div>
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                            <input type="password" id="password" autocomplete="off" name="password" placeholder="Masukkan Password">
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="chk1" checked="" type="checkbox" name="chk" class="custom-control-input"> 
                                <label for="chk1" class="custom-control-label text-sm">Ingat Saya</label>
                            </div>
                            <a href="{{route('forgot')}}" class="ml-auto mb-0 text-sm">Lupa Password?</a>
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="button" onclick="kirim()" class="btn btn-blue text-center">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('template/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('template/js/custom.min.js')}}"></script>
    <script src="{{asset('template/js/settings.js')}}"></script>
    <script src="{{asset('template/js/gleek.js')}}"></script>
    <script src="{{asset('template/js/styleSwitcher.js')}}"></script>
    <script src="{{asset('template/plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('template/plugins/toastr/js/toastr.init.js')}}"></script>

    <script src="{{asset('template/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('template/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
</body>
<script type="text/javascript">
  function kirim() {
    var email=$('#email').val();
    var password=$('#password').val();
    $.ajax({
        url : "{{route('ceklogin')}}",
        type : 'POST',
        data : {
            '_method' : 'POST',
            '_token' : '{{ csrf_token() }}',
            'email' : email,
            'password' : password
        },
        success: function(response) {
            if (response.masuk_admin) {
                sweetAlert({
                  type: 'success',
                  title: 'Login Berhasil',
                  text: 'Mohon Menunggu Proses Login',
                  showConfirmButton: false,
                  timer: 1200
              },function() {
                window.location="{{route('dashboard')}}";
            });
            }
            if (response.masuk_penghuni) {
             sweetAlert({
              icon: 'success',
              type: 'success',
              title: 'Login Berhasil',
              text: 'Mohon Menunggu Proses Login',
              showConfirmButton: false,
              timer: 1200
          },function() {
            window.location="{{route('beranda_saya')}}";
        })
         }
         if (response.notmasuk) {
          toastr.error("Login gagal","Email-Username/Password tidak sesuai",
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
      }
      if (response.kosong) {
        sweetAlert({
            icon: "warning",
            type: "warning",
            title: 'Masukkan Data',
            text: 'Harap masukkan Email dan Password anda.',
            showConfirmButton: false,
            timer: 1500
        });
    }
}
});     
}
</script>
</html>
