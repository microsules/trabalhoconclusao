
@section('title', 'Formulário de Postagens')
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
    <div class="container containerListas col-12">
        <div class="row">
            <div class="col-lg-12">
                @include('includes.errors')
                @if($post->id)
                <form action="{{ route('postagensupdate', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                <form action="{{ route('postagensinsert') }}" method="POST" enctype="multipart/form-data">
                @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title" class="text-dark font-weight-bold">Título</label>
                                <input type="text" id="title" name="title" 
                                    value="{{ $post->title }}" 
                                    class="form-control shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="category_id" class="text-dark font-weight-bold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-control shadow-sm">
                                    <option value="">Selecione</option>
                                    @foreach($categories as $category)
                                        @if($category->active == 1)
                                            <option value="{{ $category->id }}" {{ ($post->category_id == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="summary" class="text-dark font-weight-bold">Resumo</label>
                                <textarea class="form-control shadow-sm" rows="3" id="summary" 
                                    name="summary" value="">{{ $post->summary }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="text" class="text-dark font-weight-bold">Texto</label>
                                <textarea class="form-control shadow-sm" rows="3" id="text" 
                                    name="text" value="">{{ $post->text }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="active" class="text-dark font-weight-bold">Status</label>
                                <select name="active" id="active" class="form-control">
                                    <option selected="selected">Selecione</option>
                                    <option value="1" {{ $post->active && $post->id ? 'selected' : '' }}>
                                        Ativo
                                    </option>
                                    <option value="0" {{ !$post->active && $post->id ? 'selected' : '' }}>
                                        Inativo
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="url_image">Imagem (Para manter a imagem antiga, basta deixar este campo em branco.)</label>
                                <input type="file" name="url_image" id="url_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('postagens') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>