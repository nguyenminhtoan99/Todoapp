<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title','completed','user_id'];

    // public function todos()
    // {
    // return $this->belongsToMany('App\Models\User','todo_user',  'todo_id','user_id',);
    // }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
