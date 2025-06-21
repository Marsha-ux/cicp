<?php
namespace App\Http\Traits;
use App\Models\Image;

trait HasImages{
    public function images(){
       return $this->morphMany(Image::class, 'imageable');
    }
    public function addImage(string $path){
     return   $this->images()->create([
            'path' => $path
        ]);
    }
    public function updateImage(string $path,$id){
        return $this->images()->where('id',$id)->update([
            'path' => $path
        ]);
    }
    public function deleteImage($id){
        return $this->images()->where('id',$id)->delete();
    }
    public function showImage($id){
        return $this->images()->where('id',$id)->first();
    }
    public function showImages(){
        return $this->images()->get();
    }
}
