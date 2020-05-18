@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="data-user row">
                @if($user->image)
                    <div class="container-avatar">
                        <img src=" {{ route('user.avatar', ['filename' => $user->image])}} " alt="Avatar de usuario" class="avatar">
                    </div>
                @endif
                <br>
                <div class="user-info">
                    <h1> {{'@' . $user->nick}} </h1>
                    <h2> {{$user->name . ' ' . $user->surname }}</h2>
                    <span class="nickname"> {{'Se unio: ' . \FormatTime::LongTimeFilter($user->created_at)}} </span>
                </div>
            </div>

            <hr>
            
            @foreach ($user->images as $image)
                @include('includes.image', ['image' => $image])
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/like.js') }}"  type="text/javascript"></script>
@endsection