<?php

namespace App\Http\Controllers\Api;

use App\Models\BannerSlider;
use Illuminate\Http\Request;
use App\Http\Resources\BannerSliderResource;
use App\Http\Requests\StoreBannerSliderRequest;
use App\Http\Controllers\Controller;

class BannerSliderController extends Controller
{
    public function slider(Request $request, $location)
    {
        //Filter banner sliders based on the title attribute
        $query = BannerSlider::query();
        if ($request->has('title')) {
            $query->where('title', $location);
        }
        // Eager load child banners
        $bannerSliders = $query->with('banners')->get();

        return BannerSliderResource::collection($bannerSliders);
    }

    // public function show(BannerSlider $bannerSlider)
    // {
    //     return new BannerSliderResource($bannerSlider);
    // }

    public function show($id)
    {
        //dd($id);
        $bannerSlider = BannerSlider::with(['components.files','components.component'])->findOrFail($id);
        return BannerSliderResource::make($bannerSlider);
        //return response()->json($bannerSlider);
       
    }

    public function store(StoreBannerSliderRequest $request)
    {
        $validatedData = $request->validated();
        $bannerSlider = BannerSlider::create($validatedData);
        return BannerSliderResource::make($bannerSlider);
    }
}
