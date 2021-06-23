<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notesonly extends Model
{
    protected $fillable =[
        'title','note',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
