<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use App\Services\DishService;


class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();

        return DishResource::collection($dishes);
    }

    public function store(DishRequest $request, DishService $service)
    {
        $dish = $service->create( $request);
        return DishResource::make($dish);
    }
    
    public function update(DishRequest $request, DishService $service,Dish $dish)
    {
        $dish = $service->update( $request,$dish);
        return DishResource::make($dish);
    }
    
    public function destroy( DishService $service,Dish $dish)
    {

        $service->delete($dish);

        return response()->json(['message' => 'done']);

    }
}
