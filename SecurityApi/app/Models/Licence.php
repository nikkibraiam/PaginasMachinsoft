<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    protected $table= "licences";

    protected $fillable = [
        'licence_key',
        'system',
        'client_id',
        'started_at',
        'finally_at',
        'plan',
        'period',
        'amount_days',
        'state'
    ];
    
    protected $primaryKey = 'licence_key';
    public $incrementing = false;
    protected $keyType = 'string';
}
