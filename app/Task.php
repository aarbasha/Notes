<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable =[
        'title','note','exp','taskComplete','type'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
