<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Albums\CreateRequest;
use App\Http\Requests\Admin\Albums\UpdateRequest;
use App\Services\ImageService;
use App\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
        $data += ['desktop_image' => $imageService->saveImage($request->file('image_file'), 'albums/desktop', 1200, 1200)];
        $data += ['mobile_image' => $imageService->saveImage($request->file('image_file'), 'albums/mobile', 400, 400)];

        $album = Album::create($data);

        return redirect()->action('Admin\AlbumController@index')->with('flash_message', "Альбом {$album->title} добавлен!");
    }

    public function edit(Album $album) {
        return view('Admin.albums.editd', compact('album'));
    }

    public function update(Album $album, UpdateRequest $request, ImageService $imageService) {
        $data = $request->all();

        if (!empty($request->file('image_file')))
        {
            if (!empty($album->desktop_image)) Storage::delete('/public/uploaded_images/albums/desktop/' . $album->desktop_image);
            if (!empty($album->mobile_image)) Storage::delete('/public/uploaded_images/albums/mobile/' . $album->mobile_image);

            $data += ['desktop_image' => $imageService->saveImage($request->file('image_file'), 'albums/desktop', 1200, 1200)];
            $data += ['mobile_image' => $imageService->saveImage($request->file('image_file'), 'albums/mobile', 400, 400)];
        }

        $old_name = $album->title;
        $album->update($data);

        return redirect()->action('Admin\AlbumController@index')->with('flash_message', "Альбом {$old_name} обновлён!");
    }

    public function delete(Album $album) {
        $album->delete();
        return redirect()->action('Admin\AlbumController@index')->with('flash_message', "Альбом {$album->title} удалён!");
    }
}
