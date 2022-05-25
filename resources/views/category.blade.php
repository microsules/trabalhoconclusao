@section('title', 'Formulário de categoria')
@include('includes.menu')

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal | @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="class col-lg-12">
                @include('includes.errors')

                @if($category->id)
                <form action="{{ route('categoriasupdate', ['id' => $category->id]) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form action="{{ route('categoriasinsert') }}" method="POST">
                        @endif

                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="name">Título</label>
                                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" id="description" value="{{ $category->description }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="active">Status</label>
                                    <select name="active" id="active" class="form-control">
                                        <option value="1" {{ $category->active && $category->id ? 'selected' : '' }}>
                                            Ativa
                                        </option>
                                        <option value="0" {{ !$category->active && $category->id ? 'selected' : '' }}>
                                            Inativa
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('categorias') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>

</html>