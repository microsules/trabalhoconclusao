@section('title', 'Login')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Portal | @yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center justify-content-center">
            <div class="formLogin col-5">
                <div class="row">
                    <div class="col-12">
                        <h1>Login</h1>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="labelLogin" for="email">E-mail</label>
                                <input type="text" id="email" name="email" 
                                    class="form-control" >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password"
                                    class="form-control"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block btn-success">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
