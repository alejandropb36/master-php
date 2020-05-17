@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            
            @foreach ($images as $image)
                <div class="card pub_image">
                    <div class="card-header">
                        @if($image->user->image)
                            <div class="container-avatar">
                                <img src=" {{ route('user.avatar', ['filename' => $image->user->image])}} " alt="Avatar de usuario" class="avatar">
                            </div>
                        @endif
                        <div class="data-user">
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                {{$image->user->name . ' ' . $image->user->surname }}
                                <span class="nickname">
                                    {{' | @' . $image->user->nick}}
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="image-container">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="">
                        </div>
                        <div class="description">
                            <span class="nickname"> {{'@' . $image->user->nick }} </span>
                            <span class="nickname"> {{' | ' . \FormatTime::LongTimeFilter($image->created_at)}} </span>
                            <p>
                                {{ $image->description }}
                            </p>
                        </div>
                        <div class="likes">
                            <?php $user_like = false; ?>
                            @foreach($image->likes as $like)
                                @if ($like->user->id == Auth::user()->id)
                                    <?php $user_like = true; ?>
                                @endif
                            @endforeach
                            
                            @if ($user_like)
                                <img src="{{ asset('img/red-heart.png') }}" class="btn-dislike">
                            @else
                                <img src="{{ asset('img/gray-heart.png') }}" class="btn-like">
                            @endif
                            
                            <span class="number-like">{{ count($image->likes) }}</span>
                        </div>
                        <div class="comments">
                            <a href="" class="btn btn-sm btn-warning btn-comments">
                                Comentarios ({{count($image->comments)}})
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Paginacion --}}
            
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/like.js') }}"  type="text/javascript"></script>
@endsection