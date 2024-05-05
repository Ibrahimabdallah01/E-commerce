<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id)
    {
        return user::find($id);
    }

    public function getAdmin()
    {
        return $this->select('users.*')
                ->where('status', '=', 0)
                ->where('usertype', '=', 'admin')
                ->where('is_deleted', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
    }

    // public function getActiveUsers()
    // {
    //     return $this->where('status', 1)->get();
    // }

    // public function getInactiveUsers()
    // {
    //     return $this->where('status', 0)->get();
    // }
}