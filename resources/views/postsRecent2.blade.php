
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Últimas postagens</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="col-12">
        <div class="col-1">
            <a href="{{ route('postagens') }}" class="btn btn-block btn-success">
                Login
            </a>
        </div>
        @foreach($posts as $post)
            @if($post->active)
            <div class="container containerListas shadow">
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 justify-content-center">
                                <h1 class="text-dark font-weight-bold">{{ $post->title }}</h1>
                            </div>
                        </div>
                        <hr>
                        <div class="containerImg">
                            <div class="row">
                                <div class="col-12">
                                @if($post->url_image)
                                    <img class="m-12" src="{{ asset(Storage::url($post->url_image)) }}" alt="{{ $post->title }}" style="max-width: 400px">
                                @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 justify-content-center">
                                <h3 class="p-5 text-dark font-weight-bold">{{ $post->summary }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h5 class="p-5 text-dark text-justify font-weight-bold">{{ $post->text }}</h5>
                </div>
                <div class="row">
                    <div class="col-12 justify-content-center">
                        <h6 class="text-secondary font-weight-bold">Postado em: {{ $post->created_at }}</h6>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        
        
    </main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
</body>
</html>

    