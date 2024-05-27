<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';

    protected $fillable = [
        'email',
        'name',
        'caption',
        'content',
        'reviews',
        'bmc1',
        'bmc2',
        'bmc3',
        'bmc4',
        'bmc5',
        'bmc6',
        'bmc7',
        'bmc8',
        'bmc9'
    ];
}
