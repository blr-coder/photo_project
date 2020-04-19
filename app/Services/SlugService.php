<?php


namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SlugService
{
    public function makeSlug(string $title, string $table): string
    {
        $slug = Str::limit(Str::slug($title), 190);

        if (DB::table($table)->where('slug', $slug)->exists()) {
            if (empty(DB::table($table)->find(DB::table($table)->max('id'))))
                $last_id = 0;
            else
                $last_id = DB::table($table)->find(DB::table($table)->max('id'))->id;
            $last_id++;
            $slug = $slug . '-' . $last_id;
        }

        return $slug;
    }

}
