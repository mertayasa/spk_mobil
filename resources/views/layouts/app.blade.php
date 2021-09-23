<!DOCTYPE html>
<html lang="en">
<head>
    <title>Boiler</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('assets/img/favicon/apple-touch-icon.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('assets/img/favicon/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('assets/img/favicon/favicon-16x16.png')}}" sizes="16x16" type="image/png">

    <link rel="mask-icon" href="{{asset('assets/img/favicon/safari-pinned-tab.svg')}}" color="#563d7c">
    <link rel="icon" href="{{asset('assets/img/favicon/favicon.ico')}}">
    <meta name="msapplication-config" content="{{asset('assets/img/favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#563d7c">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    
    <!-- Apex Charts -->
    <link type="text/css" href="{{asset('vendor/apexcharts/apexcharts.css')}}" rel="stylesheet">
    
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}
    <!-- Datepicker -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css"> --}}


    {{-- <!-- Fontawesome -->
    <link type="text/css" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    
    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('vendor/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
    
    <!-- Notyf -->
    <link type="text/css" href="{{asset('vendor/notyf/notyf.min.css')}}" rel="stylesheet"> --}}
    
    <!-- Volt CSS -->
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/volt.css')}}" rel="stylesheet">
    
    <!-- Vendor JS -->
    {{-- <script src="{{asset('assets/js/on-screen.umd.min.js')}}"></script> --}}

    <!-- Slider -->
    {{-- <script src="{{asset('assets/js/nouislider.min.js')}}"></script> --}}

    <!-- Smooth scroll -->
    <script src="{{asset('assets/js/smooth-scroll.polyfills.min.js')}}"></script>

    <!-- Apex Charts -->
    <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Charts -->
    <script src="{{asset('assets/js/chartist.min.js')}}"></script>
    <script src="{{asset('assets/js/chartist-plugin-tooltip.min.js')}}"></script>

    <!-- Datepicker -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script> --}}

    <!-- Sweet Alerts 2 -->
    {{-- <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script> --}}

    <!-- Moment JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> --}}
    
    <!-- Notyf -->
    {{-- <script src="{{asset('vendor/notyf/notyf.min.js')}}"></script> --}}

    <!-- Simplebar -->
    {{-- <script src="{{asset('assets/js/simplebar.min.js')}}"></script> --}}

    <!-- Github buttons -->
    <script src="{{ asset('vendor/momentjs/moment.js') }}"></script>

    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Volt JS -->
    <script src="{{asset('assets/js/volt.js')}}"></script>

    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.css')}}">
    <script src="{{asset('vendor/datatables/datatables.js')}}" ></script>
  

</head>

<body>
    @include('layouts.nav')
    
    @include('layouts.sidenav')
    
    <main class="content">
        @include('layouts.topbar')
        
        @yield('content')
        
        {{-- @include('layouts.footer') --}}
    </main>
    
    <script>
        function deleteModel(deleteUrl, tableId, target = ''){
            Swal.fire({
                title: "Warning",
                text: `Yakin menghapus data ${target}? Proses ini tidak dapat diulang kembali`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : deleteUrl,
                        dataType : "Json",
                        data : {"_token": "{{ csrf_token() }}"},
                        method : "delete",
                        success:function(data){
                            // console.log(data)
                            if(data.code == 1){
                                Swal.fire(
                                    'Berhasil',
                                    data.message,
                                    'success'
                            )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message
                                })
                            }
                            $('#'+tableId).DataTable().ajax.reload();
                        }
                    })
                }
            })
          }
    
        // $(document).ready(function() {
        //     $('select').select2();
        // })
          
      </script>
    
      <!-- Page Specific JS File -->
      {{-- <script src="{{asset('admin/js/page/index.js')}}"></script> --}}
      @stack('scripts')
</body>
</html>