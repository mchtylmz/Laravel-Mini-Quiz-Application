<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
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

    public function questions()
    {
        return $this->hasMany(Question::class);
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
