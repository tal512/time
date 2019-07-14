<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Time extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'user_id', 'start_at', 'end_at', 'duration',
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
     * The project the time belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * The user the time belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set the start_at attribute. Also update duration attribute.
     *
     * @param string $startAt A datetime string in the format Y-m-d H:i:s
     */
    public function setStartAtAttribute($startAt)
    {
        $this->attributes['start_at'] = $startAt;

        if ($this->end_at) {
            $startAt = new Carbon($this->start_at);
            $endAt = new Carbon($this->end_at);
            $this->duration = $startAt->diffInSeconds($endAt);
        }
    }

    /**
     * Set the end_at attribute. Also update duration attribute.
     *
     * @param string $endAt A datetime string in the format Y-m-d H:i:s
     */
    public function setEndAtAttribute($endAt)
    {
        $this->attributes['end_at'] = $endAt;

        if ($this->start_at) {
            $startAt = new Carbon($this->start_at);
            $endAt = new Carbon($this->end_at);
            $this->duration = $startAt->diffInSeconds($endAt);
        }
    }
}
