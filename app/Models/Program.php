<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'Programs';

    protected $fillable = [
        'user_role_name',
        'program_name' ,
        'indivTargetAttendance' ,
        'indivTargetAttendance' ,
        'user_id' ,
        'name' ,
        'contact' ,
        'location' ,
        'status' ,
        'totalTargetAttendance'
    ];
}
