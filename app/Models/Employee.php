<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // public $table = "Employee";

    protected $fillable = [
        "firstName",
        "lastName",
        "email",
        "age",
        "phone",
        "address",
    ];

    use HasFactory;
}
