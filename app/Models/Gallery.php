<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Gallery extends Model
{
    use HasFactory;
    use CrudTrait;
    

    protected $table='galleries';
    protected $primaryKey='gallery_id';

    protected $fillable = [
        'title',
        'image',
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | min:3',
        ])->validate();

    }

    public function scopeImage($value, $request){
        $image = array();
       if ($request->hasFile('image')) {
           foreach ($request->image as $key => $photo) {
               $path = $photo->store('service/photos');
               array_push($image, $path);
           }
       }
       return $image;
   }
}
