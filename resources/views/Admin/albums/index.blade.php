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
                    <a href="{{ action('Admin\AlbumController@create') }}" class="btn-primary">Добавить новый альбом</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row pt-4">

                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 3%"><stromg>ID</stromg></th>
                            <th style="width: 10%">Изображение Desktop</th>
                            <th style="width: 10%">Изображение Mobile</th>
                            <th style="width: 20%">Название</th>
                            <th style="width: 10%">SLUG</th>
                            <th style="width: 8%">Дата</th>
                            <th style="width: 20%">Фотограф</th>
                            <th style="width: 10%">Локация</th>
                            <th style="width: 10%">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($albums as $album)
                            <tr>
                                <td>{{ $album->id }}</td>
                                <td><img src="/storage/uploaded_images/albums/desktop/{{ $album->desktop_image }}" class="img-fluid" alt="{{ $album->title }}"></td>
                                <td><img src="/storage/uploaded_images/albums/mobile/{{ $album->mobile_image }}" class="img-fluid" alt="{{ $album->title }}"></td>
                                <td>{{ mb_strtoupper($album->title) }}</td>
                                <td>{{ $album->slug }}</td>
                                <td>{{ date('d.m.Y', strtotime($album->date)) }}</td>
                                <td>{{ $album->photographer }}</td>
                                <td>{{ $album->location }}</td>
                                <td>
                                    <div class="row">

                                        <div class="col-12">
                                            <div>
                                                <button class="admin_edit w-100"><a href="#">Редактировать</a></button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <form method="post" action="{{ action('Admin\AlbumController@delete', [$album]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div>
                                                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить альбом со всеми уго фотографиями?')" class="admin_delete w-100">Удалить</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-12">
                                            <div>
                                                <button class="admin_more w-100"><a href="#">Фотографии</a></button>
                                            </div>
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
