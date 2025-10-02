<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestAdopt extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'requests';
    protected $primaryKey = 'number_req';
    protected $fillable=[
        'user_id',
        'pet_id',
        'phone',
        'pet_experience',
        'other_pet',
        'adopt_reason',
        'address_user',
        'status_request',

    ];

    public function pet(){
    return $this->belongsTo(Pet::class, 'pet_id', 'pet_id');
}
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
