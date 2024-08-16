<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at','deleted_at'];
    protected $fillable = ['name','slug','description'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
