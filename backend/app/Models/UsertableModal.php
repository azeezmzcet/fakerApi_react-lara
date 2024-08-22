<?php

namespace App\Models;
use database\seeders\UsersTableSeeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsertableModal extends Model
{
    use HasFactory;
    protected $table = 'usertablemodals'; 

    // Define the fillable attributes
    protected $fillable = ['name', 'phone', 'email'];
}
