<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Achievment;


class Achievment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'achievment_type_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function achievmentType()
    {
        return $this->belongsTo(AchievmentType::class);
    }

    

}
