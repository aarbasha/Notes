<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable =[
        'title','body','page_id'
    ];

    public function pages()
    {
        return $this->belongsTo(Page::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
