<?php
namespace App\Traits;
trait CommonTrait
{
    // public function scopeSearch($query, $field, $search)
    // {
    //     if ($search !== '')
    //     {
    //         return $query->where($field, 'like', "%$search%");
    //     }
    // }

    public function AddMedia($media)
    {
        $tempName=time();
        $extension=$media->getClientOriginalExtension();
        $mediaName=$tempName.'.'.$extension;
        // $path = $media->storeAs('public/Blog',$mediaName);
        // $path = $media->move(base_path('Blogs'),$mediaName);
        // $path = $media->move(public_path('Blogs'),$mediaName);
        $path = $media->move('Blogs',$mediaName);
        return $path;
    }
}