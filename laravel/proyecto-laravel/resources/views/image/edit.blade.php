@extends('layouts.app')


@section('content')
    

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                   <div class="card">
                        <div class="card-header">
                            Editar la imagen
                        </div>
                        <div class="card-body">
                            <form action="{{route('image.update')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                                    <div class="col-md-7">
                                        <input type="hidden" name="image_id" value="{{$image->id}}">
                                        @if($image->image_path)
                                            <div class="image-container image-detail">
                                                <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="{{$image->description}}">
                                            </div>
                                        @endif
                                        <input id="image_path" type="file" name="image_path" class="form-control">

                                        @if($errors->has('image_path'))
                                            <span class="ivalid-feedback" role="alert">
                                                <strong> {{ $errors->first('image_path') }} </strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-3 col-form-label text-md-right">Descripción</label>
                                    <div class="col-md-7"> 
                                        <textarea id="description" name="description" class="form-control" required>{{$image->description}}</textarea>

                                        @if($errors->has('description'))
                                            <span class="ivalid-feedback" role="alert">
                                                <strong> {{ $errors->first('description') }} </strong>
                                            </span>
                                        @endif
                                    </div>  
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3"> 
                                        <input type="submit" class="btn btn-primary" value="Editar imagen">
                                    </div>  
                                </div>
                            </form>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
@endsection