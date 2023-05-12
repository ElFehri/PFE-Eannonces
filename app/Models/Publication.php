<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'start_date',
        'end_date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'pub_id', 'id');
    }
    public function information()
    {
        return $this->hasMany(Information::class, 'pub_id', 'id');
    }
}
