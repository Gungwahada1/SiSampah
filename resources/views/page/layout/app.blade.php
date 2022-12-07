<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="{{asset('logo/logo-sisampah.svg')}}">
    <title>@yield('title') || APLIKASI SiSampah</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('logo/logo-sisampah.svg')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('template/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('template/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="{{asset('template/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('template/plugins/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/choices/choices.css')}}" rel="stylesheet">
    <link href="{{asset('template/choices/choices.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('template/plugins/jquery-asColorPicker-master/css/asColorPicker.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/summernote/dist/summernote.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    

    
    <link href="{{asset('template/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="{{asset('template/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/styletwo.css')}}" rel="stylesheet">
    <link href="{{asset('foto.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

</head>

<body>
   <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
      <meta content="{{asset('logo/logo-sisampah.svg')}}" itemprop="url"/> </div>
    <!--*******************
        Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <center>Mohon menunggu ...</center>
            </div>
        </div>

        <div id="main-wrapper">

            <div class="nav-header">
                <div class="brand-logo gradient-4">
                    <a href="">
                        <b class="logo-abbr"><img src="{{asset('template/images/logo.png')}}" alt=""> </b>
                        <span class="logo-compact"><img src="{{asset('template/images/logo-compact.png')}}" alt=""></span>
                        <span class="brand-title text-center">
                            <h3 class="text text-white">{{Auth::user()->level}}</h3>
                        </span>
                    </a>
                </div>
            </div>
            @include('page/layout/sidebar')
            @include('page/layout/header')
            <div class="content-body">
                <div class="container-fluid">
                    @yield('content')   
                </div>         
            </div>
            <div class="footer">
                <div class="copyright">
                    <p>APLIKASI SiSampah - 2022</p>
                </div>
            </div>

        </div>
        <script src="{{asset('template/plugins/common/common.min.js')}}"></script>
        <script src="{{asset('template/js/custom.min.js')}}"></script>
        <script src="{{asset('template/js/settings.js')}}"></script>
        <script src="{{asset('template/js/gleek.js')}}"></script>
        <script src="{{asset('template/js/styleSwitcher.js')}}"></script>
        <script src="{{asset('template/choices/choices.js')}}"></script>
        <script src="{{asset('template/choices/choices.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Chartjs -->
        <script src="{{asset('template/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <!-- Circle progress -->
        <script src="{{asset('template/plugins/circle-progress/circle-progress.min.js')}}"></script>
        <!-- Datamap -->
        <script src="{{asset('template/plugins/d3v3/index.js')}}"></script>
        <script src="{{asset('template/plugins/topojson/topojson.min.js')}}"></script>
        <script src="{{asset('template/plugins/datamaps/datamaps.world.min.js')}}"></script>
        <!-- Morrisjs -->
        <script src="{{asset('template/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('template/plugins/morris/morris.min.js')}}"></script>
        <!-- Pignose Calender -->
        <script src="{{asset('template/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
        <!-- Clock Plugin JavaScript -->
        <script src="{{asset('template/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="{{asset('template/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
        <script src="{{asset('template/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
        <script src="{{asset('template/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="{{asset('template/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- Date range Plugin JavaScript -->
        <script src="{{asset('template/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{asset('template/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- <script src="{{asset('template/js/plugins-init/form-pickers-init.js')}}"></script> -->
        <script src="{{asset('template/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('template/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
        <!-- ChartistJS -->
        <script src="{{asset('template/plugins/toastr/js/toastr.min.js')}}"></script>
        <script src="{{asset('template/plugins/toastr/js/toastr.init.js')}}"></script>
        <script src="{{asset('template/plugins/chartist/js/chartist.min.js')}}"></script>
        <script src="{{asset('template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
        <script src="{{asset('template/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
        <script src="{{asset('template/plugins/sweetalert/js/sweetalert.min.js')}}"></script>

        <script src="{{asset('template/plugins/summernote/dist/summernote.min.js')}}"></script>
        <script src="{{asset('template/plugins/summernote/dist/summernote-init.js')}}"></script>
        <script src="{{asset('template/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
        <script src="{{asset('template/js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{asset('template/js/plugins-init/chartjs-init.js')}}"></script>
        <script type="text/javascript">
           $(document).ready(function() {
            $("#copy").hide();
            $("#add-more").click(function(){ 
             var html = $("#copy").html();
             $("#after-add-more").after(html);
         });

            $("body").on("click","#remove",function(){ 
                $(this).parents("#control-group").remove();
            });
        });
    </script>
    <script type="text/javascript">
       $(document).ready(function() {
        setInterval(function(){
            read()
        }, 200);   
    })
       function read() {
        $.get("{{ route('read') }}", {}, function(data, status) {
            if(data.code == 200){
                var html = "";
                for(let i = 0; i <= 3; i++){
                    if (i == 2) {
                        $("#test"+i).html(data.data+' Notifikasi Penarikan');
                    }else {
                        $("#test"+i).html(data.data);
                    }
                }
                for (let x = 0; data.tarik.length > x; x++) {
                    html += "<li>";
                    html += "<a class='btn btn-sm form-control' href='{{route('penarikan_saya')}}' target='_blank'>";
                    html += "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti ti-wallet'></i></span>";
                    html += "<div class='notification-content'>";
                    html += "<h6 class='notification-heading'>"+'Rp '+data.tarik[x].jml_penarikan.toLocaleString()+"</h6>";
                    html += "<span class='notification-text'>"+data.tarik[x].tanggal_penarikan+' '+data.tarik[x].waktu_penarikan+"</span>";
                    html += "</div>";
                    html += "</a>";
                    html += "</li>";
                }
                $("#test4").html(html);
            }
        });
    }
</script>
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
          $('.image-upload-wrap').hide();

          $('.file-upload-image').attr('src', e.target.result);
          $('.file-upload-content').show();

          $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
}
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
</body>
@include('page/layout/notif')
</html>