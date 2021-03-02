<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table= "clients";

    protected $fillable = [
        'id',
        'machine_name',
        'mac',
        'ip',
        'password'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
