@extends('layouts.admin')

@section('title')
    <title>Admin panel | Редактировать альбом</title>
@endsection

@section('content')

    <section id="admin" class="admin-articles">
        <div class="container">

            <div class="row pt-5">
                <div class="col-md-8 col-12 text-md-left text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ action('Admin\AdminController@index') }}">Администратор</a></li>
                            <li class="breadcrumb-item"><a href="{{ action('Admin\AlbumController@index') }}">Альбомы</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Редактирование альбома</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-sm-12 text-center">
                    <h5>Редактирование альбома {{ $album->title }}</h5>
                </div>
            </div>

            <form action="{{ action('Admin\AlbumController@update', [$album]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="form-group col-lg-8 col-12">
                        <label for="title">Наименование</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $album->title }}" id="title" name="title" maxlength="190" required >
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label for="date">Дата (может быть пустой)</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $album->date }}">
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="description">Описание (может быть пустым)</label>
                        <textarea name="description" id="description" maxlength="5000" class="form-control @error('description') is-invalid @enderror" cols="10">{{ $album->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="photographer">Фотограф (поле может быть пустым)</label>
                        <input type="text" class="form-control @error('photographer') is-invalid @enderror" value="{{ $album->photographer }}" id="photographer" name="photographer" maxlength="190">
                        @error('photographer')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('photographer') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="location">Локация (поле может быть пустым)</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ $album->location }}" id="location" name="location" maxlength="190">
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="old_image">Изображение сейчас</label>
                        <img src="/storage/uploaded_images/albums/desktop/{{ $album->desktop_image }}" alt="img" class="img-fluid" id="old_image" style="width: 25%;">
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label for="image_file">Для замены изображения</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file">
                        @error('image_file')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_file') }}</strong>
                            </span>
                        @enderror
                        <p class="help-block my-4">Файл будет приведен к размерам 1200px * 1200px(для больших экранов) и 400px * 400px(для мобильных устройств)</p>
                    </div>

                </div>
                <hr>

                <div class="row pb-5">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </div>

            </form>

        </div>
    </section>

@stop

