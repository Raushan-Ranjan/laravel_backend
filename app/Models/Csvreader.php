<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csvreader extends Model
{
    use HasFactory;
    protected $table = 'csvreaders';
    protected $fillable = ['Identifier','username','first_name','last_name'];
}
