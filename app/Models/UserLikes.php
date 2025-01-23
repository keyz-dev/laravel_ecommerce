<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLikes extends Model
{
    protected $fillable = [
        "user_id",
        "product_id"
    ];
}
