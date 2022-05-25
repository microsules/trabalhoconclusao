
@section('title', 'Listagem de categoria')
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
        <div class="class row color='red'">
            <div class="class col-lg-12">
                <a href="{{ route('categoriasnovo') }}" class="btn btn-success mb-3">Novo</a>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{ ($category->active == 1) ? 'Ativa' : 'Inativa' }}</td>
                            <td>
                            <form onsubmit="return confirmDelete()" action="{{ route('categoriasdelete', ['id'=> $category->id] )}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a href="{{ route('categoriasform', ['id'=> $category->id] )}}" class="btn btn-info">Editar</a>
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
    
