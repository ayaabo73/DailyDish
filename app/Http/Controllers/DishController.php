<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {   
        $dishes = Dish::all();
        return view("dishes.index", compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        $dish= Dish::create([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        if($request->hasFile('images')){
            foreach($request->file('images') as $imageFile){
                $dish->addMedia($imageFile)->toMediaCollection('images');
            }
        }


        return 'تمت الاضافة بنجاح';

    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view("dishes.edit", compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $dish-> update([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        
        if($request->hasFile('images')){
            $dish->clearMediaCollection('images');
            foreach($request->file('images') as $imageFile){
                $dish->addMedia($imageFile)->toMediaCollection('images');
            }
        }

        return 'تمت تعديل بنجاح';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index');
    }
}
