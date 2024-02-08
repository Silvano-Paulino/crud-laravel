@extends('master')

@section('content')
    <h2>Editando o user</h2>

    <div style="margin-top: 4rem;max-width: 900px;">
        <form action="{{route('users.update')}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="text" style="padding: 1rem;" name="name" value="{{$data->name}}">
            <input type="email" style="padding: 1rem;" name="email" value="{{$data->email}}">
            <input type="text" name="telefone" style="padding: 1rem;" value="{{$data->telefone}}">
            <input type="password" name="password" style="padding: 1rem;">

            <button type="submit" style="padding: 1rem;cursor: pointer;margin-top: 2rem;">Atualizar</button>
        </form>
    </div>
@endsection