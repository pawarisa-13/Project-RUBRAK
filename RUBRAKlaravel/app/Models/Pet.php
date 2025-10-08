<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'pet_id';
    public $timestamps = false;
    protected $fillable = [
        'name_pet',
        'age_pet',
        'gender',
        'picture',
        'breed',
        'vaccine',
        'status',
        'info',
        'foundation',
        'province',
        'type',
    ];

    public function requests(){
        return $this->hasMany(RequestAdopt::class, 'pet_id');
    }

}
