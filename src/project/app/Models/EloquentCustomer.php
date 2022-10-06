<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentCustomer extends Model
{
    use HasFactory;

    protected $table = 'customers';
}
