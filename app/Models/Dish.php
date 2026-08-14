<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Dish extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['title', 'body'];
}
