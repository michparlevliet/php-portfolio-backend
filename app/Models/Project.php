<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'url',
        'content',
        'slug',
        'image',
        'type_id',
        'user_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projectSkills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

}
