<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_container',
        'type_container',
        'code'
    ];

    public function getFullContainerAttribute()
    {
        return $this->nama_container . ' / ' . $this->type_container;
    }
}
