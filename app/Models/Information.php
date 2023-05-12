<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];


    public function publication(){
        return $this->belongsTo(Publication::class,'pub_id', 'id');
    }
}
