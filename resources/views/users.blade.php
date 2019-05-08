@extends ('index')
@section ('title', 'Listagem de usuários')
@section ('content')

@if (empty($users[0]))
<div style="height: 90vh;" class="d-flex flex-column">
    <div class="m-auto text-center">
        <p class="display-2 text-center">Sem usuários cadastrados</p>
        <a href="{{route('user.create')}}" class="btn btn-dark">Adicionar usuário</a>
    </div>
</div>
@else

<h1>Usuários</h1>
<br>

<a href="{{route('user.create')}}" class="btn btn-primary btn-add">
    <span class="glyphiicon glyphicon-plus"></span>Cadastrar usuário
</a>
<br><br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data de criação</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tr>
        <td scope="row">{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td>
            <a href="{{route('user.edit',['id' => $user->id])}}" class="mr-3 btn btn-outline-primary">Editar</a>
            <button onclick="
                        {
                            let confirmation = confirm('Tem certeza que deseja excluir o usuário {{$user->name}}?')
                            if (confirmation) {
                                axios.delete('{{route('user.delete', ['id'=>$user->id])}}')
                                    .then((res)=> {
                                        location.reload('true')
                                    })
                            }
                        }" class="w-50 btn btn-outline-danger">
                <i class="far fa-trash-alt"></i>
                Deletar
            </button>
        </td>
    </tr>
    @endforeach
    <table>
        @endif
        @endsection
