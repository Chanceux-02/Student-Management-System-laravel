<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    protected $guarded = []; //kung gusto mo nga ma allow tanan nga mag edit sa database advantage ya kung damo nd kana yawan type kay i allow yana tanan.
    // protected $fillable = ['first_name','last_name']; //amuni naman kung gusto mo nga may specefic ka lang ang editon.
    
    use HasFactory;
}
