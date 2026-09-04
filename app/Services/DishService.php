<?php

namespace App\Services;

use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Intervention\Image\Image;

class DishService
{
    public function create(DishRequest $request): Dish
    {
        $dish =  Dish::create([
            'title' =>$request->input('title'),
            'body' =>  $request->input('body') ,
        ]);

        if($request->hasFile('images')){
            foreach($request->file('images') as $imageFile){
                $dish->addMedia($imageFile)->toMediaCollection('images');
            }
        }
        
        return $dish;
    }

    public function update(DishRequest $request , Dish $dish): Dish
    {
        $dish -> update([
            'title' => $request->input('title'),
            'body' =>  $request->input('body') ,
        ]);
        if($request->hasFile('images')){
            $dish->clearMediaCollection('images');
            foreach($request->file('images') as $imageFile){
                $dish->addMedia($imageFile)->toMediaCollection('images');
            }
        }

        return $dish;
    }

    public function delete(Dish $dish): bool
    {
        return $dish->delete();

    }
}
