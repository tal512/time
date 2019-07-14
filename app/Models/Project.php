<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_at', 'end_at', 'budget',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be converted to time instances.
     *
     * @var array
     */
    protected $dates = [
        'start_at', 'end_at',
    ];

    /**
     * Times the project has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function times()
    {
        return $this->hasMany(Time::class);
    }

    /**
     * Get the sum of all durations of the project's times in hours.
     *
     * @return float
     */
    public function getUsedBudgetAttribute()
    {
        return round($this->times()->sum('duration') / 3600, 2);
    }
}
