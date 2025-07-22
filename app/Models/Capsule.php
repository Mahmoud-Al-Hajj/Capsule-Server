<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capsule extends Model
{
use HasFactory;

/* protected $fillable = [
    'user_id', 'title', 'message', 'mood',
    'reveal_at', 'is_public', 'ip_address',
    'latitude', 'longitude'
];
*/

public function user(){
    return $this->belongsTo(User::class, 'user_id');
}

}
