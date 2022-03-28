<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Achievment;


class AchievmentType extends Model
{
    use HasFactory;

    public function achievments()
    {
        return $this->hasMany(Achievment::class);
    }
}
