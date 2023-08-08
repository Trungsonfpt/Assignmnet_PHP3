<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>


    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>

<!-- Menu -->

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homepage')}}">Sinh viên</a>
                </li>

            </ul>
        </div>
    </div>
</nav>



<!-- Content -->
<div class="container mt-4">
    @include('templace.error')
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-light text-center p-3 mt-4">
    <p>Đây là footer của trang web.</p>
    <p>&copy; 2023 Nguyễn Trung Sơn</p>
</footer>


<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</body>

<script src="{{asset('bootstrap/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('bootstrap/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script>
    $(function () {
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cmt_anh").change(function () {
            readURL(this, '#anh_the_preview');
        });

    });
</script>

</html>
