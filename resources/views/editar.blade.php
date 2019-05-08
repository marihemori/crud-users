@extends('index')

@section('title','Editar usuários')

@section('content')

<h1>Editar usuário</h1>

@if ( @isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>

@endisset

<form class="form" method="POST" action="{{route('user.update', $user->id)}}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <input type="email" name="email" placeholder="E-Mail" class="form-control" value="{{$user->email}}">
    </div>

    <div class="form-group">
        <input type="date" name="birthdate" placeholder="Data de nascimento" class="form-control"
            value="{{$user->birthdate}}">
    </div>

    <div class="form-group form-inline">
        <input type="password" name="password" placeholder="Senha" class="form-control col-9"
            value="{{$user->password}}">
        <input disabled type="text" placeholder="Criado em" class="form-control col-3" value="{{$user->created_at}}">
    </div>

    <div class="form-group form-inline">
        <button type="submit" class="mr-2 btn btn-outline-success">Salvar</button>
        <a href="{{route('user.list')}}" class="mr-3 btn btn-outline-danger">Cancelar</a>
    </div>

</form>



@endsection
