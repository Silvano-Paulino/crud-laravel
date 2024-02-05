@extends('master')

@section('content')
    <h2>users</h2>

    <ul>
        @foreach ($data as $user)
            <li> {{$user->name}} | <a href="{{route('users.edit', $user->id)}}">Editar</a> | <a href="">Delete</a> </li>    
        @endforeach
    </ul>

    <div style="margin-top: 4rem;max-width: 900px;">
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <input type="text" style="padding: 1rem;" name="name" placeholder="Inserir nome">
            <input type="email" style="padding: 1rem;" name="email" placeholder="Inserir email">
            <input type="text" name="telefone" style="padding: 1rem;" placeholder="Inserir telefone">
            <input type="password" name="password" style="padding: 1rem;" placeholder="Inserir password">

            <button type="submit" style="padding: 1rem;cursor: pointer;margin-top: 2rem;">Cadastrar</button>
        </form>
    </div>

@endsection