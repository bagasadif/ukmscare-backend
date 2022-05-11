<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function ukmRegistration()
    {
        return $this->hasMany(UkmRegistration::class);
    }

    public function ukmRegistDescription()
    {
        return $this->hasOne(UkmRegistDescription::class);
    }
}
