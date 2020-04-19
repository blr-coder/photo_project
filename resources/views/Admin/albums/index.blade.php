@extends('layouts.admin')

@section('title')
    <title>Admin panel - Альбомы</title>
@endsection

@section('content')


    <section id="admin" class="admin-articles">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-12 text-md-left text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ action('Admin\AdminController@index') }}">Администратор</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Альбомы</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="{{ action('Admin\AlbumController@create') }}" class="btn-primary mt-1">Добавить новый альбом</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row pt-4">

                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 20%">Изображение для превью</th>
                            <th style="width: 20%">Изображение для мобильных устройств</th>
                            <th style="width: 10%">Название</th>
                            <th style="width: 10%">SLUG</th>
                            <th style="width: 10%">Дата</th>
                            <th style="width: 10%">Фотограф</th>
                            <th style="width: 10%">Локация</th>
                            <th style="width: 10%">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($albums as $album)
                            <tr>
                                <td><img src="/storage/uploaded_images/albums/small/{{ $album->image_for_desktop_small }}" class="img-fluid" alt="{{ $album->title }}"></td>
                                <td><img src="/storage/uploaded_images/albums/mobile/{{ $album->image_for_mobile }}" class="img-fluid" alt="{{ $album->title }}"></td>
                                <td>{{ mb_strtoupper($album->title) }}</td>
                                <td>{{ $album->slug }}</td>
                                <td>{{ date('d.m.Y', strtotime($album->date)) }}</td>
                                <td>{{ $album->photographer }}</td>
                                <td>{{ $album->location }}</td>
                                <td>
                                    <div class="row">

                                        <div class="col-12">
                                            <a href="" class="btn-edit w-100">Редактировать</a>
                                        </div>

                                        <div class="col-12">
                                            <form method="post" action="">
                                                @csrf
                                                @method('DELETE')
                                                <div>
                                                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить фотосессию со всеми её фотографиями?')" class="btn-remove w-100">Удалить</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-12">
                                            <a href="" class="btn-edit w-100">Фотографии</a>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
@endsection
