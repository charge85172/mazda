<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCarModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_cars';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['merk', 'model', 'bouwjaar'];
}
