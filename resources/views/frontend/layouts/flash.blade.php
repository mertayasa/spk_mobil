@if ($message = Session::get('success'))
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.localStorage.clear();
            })
        })
    </script>
@endif

@if ($message = Session::get('error') )
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'error',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.localStorage.clear();
            })
        })
    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'warning',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.localStorage.clear();
            })
        })
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'info',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 3000
                });
                window.localStorage.clear();
            })
        })
    </script>
@endif