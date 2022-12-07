@if(session('add'))
<script type="text/javascript">
  toastr.success("Data Success","Data Berhasil di Tambahkan",
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
@if(session('up'))
<script type="text/javascript">
  toastr.success("Data Success","Data Berhasil di Ubah",
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
@if(session('del'))
<script type="text/javascript">
  toastr.error("Data Success","Data Berhasil di Hapus",
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
@if(session('tarik'))
<script type="text/javascript">
   sweetAlert({
    icon: "success",
    type: "success",
    title: 'Penarikan Berhasil',
    text: 'Tarik Tabungan Nasabah berhasil di tambahkan.',
    showConfirmButton: false,
    timer: 1500
});
</script>
@endif
@if(session('tukar'))
<script type="text/javascript">
   sweetAlert({
    icon: "success",
    type: "success",
    title: 'Penukaran Berhasil',
    text: 'Tukar Poin Nasabah berhasil di tambahkan.',
    showConfirmButton: false,
    timer: 1500
});
</script>
@endif