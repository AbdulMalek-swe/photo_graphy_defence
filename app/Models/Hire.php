<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;
    use CrudTrait;
    protected $table='hires';
    protected $primaryKey='hire_id';

    protected $fillable = [
        'user_id',
        'photographer_id',
        'title',
        'price',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photographer(){
        return $this->belongsTo(User::class);
    }
}
