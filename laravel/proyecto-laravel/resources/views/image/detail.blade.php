@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if($image->user->image)
                        <div class="container-avatar">
                            <img src=" {{ route('user.avatar', ['filename' => $image->user->image])}} " alt="Avatar de usuario" class="avatar">
                        </div>
                    @endif
                    <div class="data-user">
                        {{$image->user->name . ' ' . $image->user->surname }}
                        <span class="nickname">
                            {{' | @' . $image->user->nick}}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="image-container image-detail">
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
                            <img src="{{ asset('img/red-heart.png') }}" class="btn-dislike" data-id="{{ $image->id }}">
                        @else
                            <img src="{{ asset('img/gray-heart.png') }}" class="btn-like" data-id="{{ $image->id }}">
                        @endif
                        
                        <span class="number-like">{{ count($image->likes) }}</span>
                    </div>

                    @if (Auth::user() && Auth::user()->id == $image->user_id)    
                        <div class="actions">
                            <a href=" {{ route('image.edit', ['id' => $image->id]) }} " class="btn btn-sm btn-primary">Actualizar</a>

                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                Borrar
                            </button>
                            
                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                            
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Estas seguro</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Una vez eliminada no se podra recuperar la imagen, Estas seguro?
                                    </div>
                                                            
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href=" {{ route('image.delete', ['id' => $image->id]) }} " class="btn btn-danger">Borrar definitivamente</a>
                                    </div>
                            
                                </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="clearfix"></div>
                    <div class="comments">
                        <h2>
                            Comentarios ({{count($image->comments)}})
                        </h2>
                        <hr>

                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea name="content" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}"></textarea>
                                @if($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('content') }} </strong>
                                    </span>
                                @endif
                            </p>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </form>
                        <hr>
                        @foreach ($image->comments as $comment)
                            <div class="comment">
                                <span class="nickname"> {{'@' . $comment->user->nick }} </span>
                                <span class="nickname"> {{' | ' . \FormatTime::LongTimeFilter($comment->created_at)}} </span>

                                <p>
                                    {{ $comment->content }}
                                    <br>
                                    @if(Auth::check() && ($comment->user_id == Auth::user()->id || $image->user->id == Auth::user()->id))
                                        <a href="{{route('comment.delete', ['id' => $comment->id])}}" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </a>
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/like.js') }}"  type="text/javascript"></script>
@endsection