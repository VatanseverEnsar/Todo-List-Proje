<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TodoList extends Model
{
    protected $table = 'todo_list';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'todo_content',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
