
@section('title', 'Postagenss')
    @include('includes.menu')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Portal | @yield('title')</title>
</head>
<body>
    <div class="container containerListas col-12">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('postagensnovo') }}" class="btn btn-success mb-3">Novo</a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Data da Postagem</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Resumo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    @foreach($posts as $post)
                        @if($post->active)
                        <tr>
                        @else
                        <tr class="table-secondary">
                        @endif
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->summary }}</td>
                            <td>{{ ($post->active == 1) ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <form onsubmit="return confirmDelete();" action="{{ route('postagensdelete', ['id'=> $post->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <a href="{{ route('postagensform', ['id'=> $post->id]) }}" class="btn btn-info">
                                        Editar
                                    </a>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>