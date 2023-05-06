<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = "informations";
    protected $fillable = [
        "name",
        "course",
        "email",
        "phone"
    ];
    use HasFactory;
}
