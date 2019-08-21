<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemBonus extends Model
{
    use SoftDeletes;

    public $table = 'item_bonuses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'count',
        'status'
    ];
}
