<?php

namespace App\Services\Common;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class Base64ConverterService{

static function Base64toImage($base64) {
    [$type, $content] = explode(',', $base64);
    $extension = Str::after(Str::before($type, ';'), '/');
    $filename = Str::random(10) . '.' . $extension;

    Storage::disk('public')->put($filename, base64_decode($content));

    return Storage::url($filename); //  '/storage/filename.ext'

}
}

//data:image/;base64,/9j/4AAQSkZJRgABAQEASABIA........

