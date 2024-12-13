<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Profile extends Model
{
    use HasFactory;
    use CrudTrait;
    

    protected $table='profiles';
    protected $primaryKey='profile_id';

    protected $fillable = [
        'title',
        'user_id',
        'role_id',
        'location',
        'phone',
        'properties',
        'image',
        'body',
    ];

    
    protected $casts = [
        'properties' => 'array'
    ];


    public function setPropertiesAttribute($value)
    {
        $properties = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['id'])) {
                $properties[] = $array_item;
            }
        }

        $this->attributes['properties'] = json_encode($properties);
    }

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | min:3',
        ])->validate();
    }

    public function scopeImage($value, $request){
        $image = array();
       if ($request->hasFile('image')) {
           foreach ($request->image as $key => $photo) {
               $path = $photo->store('profile/photos/');
               array_push($image, $path);
           }
       }
       return $image;
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
