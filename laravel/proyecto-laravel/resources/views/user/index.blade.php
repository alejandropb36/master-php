@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            <h1>Gente</h1>
            <hr>
            <form action="{{route('user.index')}}" method="GET">
                <div class="form-group row">
                    <label for="serach">Buscar: </label>
                    <input type="text" name="search" id="search" class="form-control">
    
                    <input type="submit" value="Buscar">
                    
                </div>
            </form>
            
            @foreach ($users as $user)
                <div class="data-user row">
                    @if($user->image)
                        <div class="container-avatar">
                            <img src=" {{ route('user.avatar', ['filename' => $user->image])}} " alt="Avatar de usuario" class="avatar">
                        </div>
                    @else
                        <div class="container-avatar">
                            <img src=" {{ asset('img/usuario.png')}} " alt="Avatar de usuario" class="avatar">
                        </div>
                    @endif
                    <br>
                    <div class="user-info">
                        <h1> {{'@' . $user->nick}} </h1>
                        <h2> {{$user->name . ' ' . $user->surname }}</h2>
                        <span class="nickname"> {{'Se unio: ' . \FormatTime::LongTimeFilter($user->created_at)}} </span>
                        <a href="{{route('user.profile', ['id' => $user->id])}}" class="btn btn-success">Ver perfil</a>
                    </div>
                </div>
                <hr>
            @endforeach
            {{-- Paginacion --}}
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection