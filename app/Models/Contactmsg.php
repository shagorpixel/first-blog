<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactmsg extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','message','subject'
    ];
}
