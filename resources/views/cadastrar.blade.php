@extends('index')

@section('title','Cadastro de usuários')

@section('content')

<h1>Novo usuário</h1>

@if ( @isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>

@endisset
<br>

<form class="form" method="POST" action="{{route('user.store')}}">
    @csrf

    <div class="form-group">
        <input type="text" name="name" placeholder="Nome" class="form-control" value="{{old('name')}}">
    </div>

    <div class="form-group">
        <input type="email" name="email" placeholder="E-Mail" class="form-control" value="{{old('email')}}">
    </div>

    <div class="form-group">
        <input type="date" name="birthdate" placeholder="Data de nascimento" class="form-control"
            value="{{old('birthdate')}}">
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Senha" class="form-control">
    </div>

    <div class="form-group form-inline">

        <button class="mr-2 btn btn-outline-success">Salvar</button>
        <button class="mr-3 btn btn-outline-danger">Cancelar</button>

        <a href="{{route ('user.list')}}">Listar usuários</a>
    </div>


</form>


@endsection
