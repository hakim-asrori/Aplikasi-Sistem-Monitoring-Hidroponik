<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="{{ url('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <img src="{{ url('img/logo.png') }}">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hidroponik Automatic</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ url('login') }}"
                                        onsubmit="return false;" id="form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                        </div>
                                        <button id="login" class="btn btn-success btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="{{ url('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    @if (session('message'))
        {!! session('message') !!}
    @endif
    <script>
        $(document).ready(function() {
            $("#login").on('click', function() {
                let username = $('#username').val().trim();
                let password = $('#password').val().trim();

                if (username == '' || password == '') {
                    Swal.fire('Ooops!', 'Form login harap diisi!', 'error')
                } else {
                    document.getElementById('form').onsubmit = true;
                }
            })
        })
    </script>

</body>

</html>
