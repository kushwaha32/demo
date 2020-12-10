<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Content extends Model
{
   
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'img' => 'array',
        'iframe' => 'array'
    ];

    public function navchild()
    {
        $this->belongsTo('App\Models\Navchild', 'navchild_id');
    }
    public function contentDiscription(){
        return $this->hasManey('App\Models\Contentdiscription');
    }
}
