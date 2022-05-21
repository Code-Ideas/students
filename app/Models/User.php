<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'code', 'collage_id', 'department_id', 'year_id', 'active',
        'api_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function collage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Collage::class);
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function year(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    public function notifications()
    {
        return UserNotification::whereJsonContains('users', auth()->id());
    }

    public function seenNotifications()
    {
        return $this->notifications()->whereJsonContains('seen_users', auth()->id())->get();
    }

    public function newNotifications()
    {
        return $this->notifications()->whereJsonDoesntContain('seen_users', auth()->id())->get();
    }
}
