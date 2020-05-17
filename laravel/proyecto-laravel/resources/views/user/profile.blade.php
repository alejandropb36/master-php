@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            
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