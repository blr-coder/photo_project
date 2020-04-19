<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ImageService
{

    public function saveImage($image, string $folder, int $width, int $height = null, string $filename = null): string
    {
        if (empty($filename))
            $filename = Str::random(32) . '.' . $image->getClientOriginalExtension();
        else
            $filename = $filename . '.' . $image->getClientOriginalExtension();
        $path = storage_path('app/public/uploads/' . $folder . '/' . $filename);

        $existed_directories = Storage::allDirectories('public');   // массив всех существующих директорий в "public"

        if(!in_array($path, $existed_directories))
        {
            Storage::makeDirectory('public/uploads/' . $folder); // если данного пути не существует, то создаём его.
        }

        if (!empty($height))
            Image::make($image)->fit($width, $height)->save($path);
        else
            Image::make($image)->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);
        return basename($filename);
    }

}
