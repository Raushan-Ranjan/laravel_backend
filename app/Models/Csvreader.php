<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csvreader extends Model
{
    use HasFactory;
    protected $table = 'csvupload';
    protected $fillable = ['motor_controller_type_id','controller_id','lot_no','has_uart'];
}
