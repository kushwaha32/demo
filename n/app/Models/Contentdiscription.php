<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contentdiscription extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'img' => 'array',
        'iframe' => 'array'
    ];

    public function content(){
        return $this->belongsTo('App\Models\Content');
    }
}
