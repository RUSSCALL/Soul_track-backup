<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collosal extends Model
{
    use HasFactory;
    protected $table = 'collosal';

    protected $fillable = [
        'winner_id',
        'fullName' ,
        'place_of_meeting',
        'location' , 
        'occupation' ,
        'num1', 
        'num2' , 
        'num3', 
        'email',
        'general_comments',
        'not_born_again',
        'already_born_again',
        'got_born_again',
        'already_in_church',
        'no_church', 
        'HG_filled'
    ];
}
