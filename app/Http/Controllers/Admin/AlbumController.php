<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Albums\CreateRequest;
use App\Services\ImageService;
use App\Services\SlugService;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::orderBy('date', 'desc')->get();
        return view('Admin.albums.index', compact('albums'));
    }

    public function create() {
        return view('Admin.albums.create');
    }

    public function store(CreateRequest $request, ImageService $imageService, SlugService $slugService) {
        $data = $request->all();

        $data += ['slug' => $slugService->makeSlug($data['title'], 'albums')];
        $data += ['image' => $imageService->saveImage($request->file('image_file'), 'albums', 1920, 1080)];

        $album = Album::create($data);

        return redirect()->action('Admin\AlbumController@index')->with('flash_message', "Альбом {$album->title} добавлен!");
    }
}
