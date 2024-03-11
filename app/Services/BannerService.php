<?php 
namespace App\Services;

class BannerService 
{
    public function customizeBanner($banner): array
    {
        $data = [];
        $tmp = [];
        foreach($banner->components as $component)
        {
            $tmp = [];
            //dd($component->component);
            $tmp['id'] = $component->component->id;
            $tmp['title'] = $component->component->title;
            $tmp['time_slot'] = $component->component->time_slot;
            $tmp['slug'] = $component->component->slug;
            $tmp['subtitle'] = $component->component->subtitle;
            $tmp['link'] = $component->component->link;
            $tmp['imagelogo'] = $component->component->imagelogo;
            $tmp['width'] = $component->component->logo_width;
            
            //dd($component->component->title);
            foreach($component->files as $file) 
            {
                //dump($file);
                if($file->mime == 'video/mp4'){
                    $tmp['video'] = $file->url;
                }
            }
            $data[] = json_decode(json_encode($tmp));
        }
        //dd($data);
        return $data;
    }
}