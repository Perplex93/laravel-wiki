<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    // protected $table = 'my_flights';


    public function categories() {
        return $this->belongsTo('App\Models\Category');
    }

    // user belongsTo

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}
