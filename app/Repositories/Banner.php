<?php 
namespace App\Repositories;

use App\Models\BannerSlider;
use App\Http\Resources\BannerSliderResource;

class Banner extends Base 
{
    public function getDataResource(&$data, $page = 2): void
    {        
        $bannerSlider = BannerSlider::with([
            'components.files',
            'components.component'
            ])->findOrFail($page);

        $data['BANNER'] = BannerSliderResource::make($bannerSlider);
    }
}