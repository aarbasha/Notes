<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Page extends Model
{
    protected $fillable =[
        'title','discraption','type',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
