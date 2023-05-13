<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'pub_id');
    }
}
