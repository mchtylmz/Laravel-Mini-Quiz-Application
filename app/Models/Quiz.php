<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use stdClass;

class Quiz extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 
        'description', 
        'slug',
        'status', 
        'started_at', 
        'finished_at'
    ];

    protected $date = ['started_at', 'finished_at'];

    /**
     * protected $append = ['is_started', 'is_finished'];
     */

    public function getStartedAtAttribute($date)
    {
        return $date ? Carbon::parse($date):null;
    }

    public function getIsStartedAttribute()
    {
        return $this->started_at ? $this->started_at->format('Y-m-d H:i') < date('Y-m-d H:i'):true; 
    }

    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date):null;
    }

    public function getIsFinishedAttribute()
    {
        return $this->finished_at ? date('Y-m-d H:i') > $this->finished_at->format('Y-m-d H:i'):false; 
    }

    public function getInfoAttribute()
    {
        $result = $this->result();
        $info = new stdClass();
        $info->average = number_format($result->avg('point'), 1);
        $info->participants = $result->count();
        return $info;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function myResult()
    {
        return $this->hasOne(Result::class)->where('user_id', auth()->user()->id)->latest();
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }
}
