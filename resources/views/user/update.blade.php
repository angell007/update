@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">


                <div class="card-header">Update</div>

                ​<picture class="text-center">
                   <img src="/img/{{$user->img}}" class="img-fluid img-thumbnail" alt="Avatar"
                   style="
                   border-radius:50%;
                   padding: 5px;
                   width:200px;
                    ">
                 </picture>

                <div class="card-body">
                    <form method="POST" action="{{ route('updates.update', Auth::user()->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name',$user->name) }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input class="jscolor form-control @error('color') is-invalid @enderror" id="color"
                                    name="color" value="{{ old('color', $user->color) }}" required autocomplete="name"
                                    autofocus>

                                @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-6">

                                    <label for="file-upload" class="subir btn btn-outline-dark btn-round btn-xs">
                                        <i class="fas fa-cloud-upload-alt"></i> Imagen
                                    </label>

                                    <input id="file-upload" onchange='cambiar()' name="file" type="file" style='display: none;' />
                                </div>
                            </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" style="margin-top:10px">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
