<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    const PATH='Images/users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'photo'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function group(){
        return $this->hasOne(UserGroup::class);
    }

    public function user_role(){
        return $this->group->group_id;
    }

    public function attachGroup($group_id): void
    {
        if($this->group != null)
            $this->group()->update([
                'group_id' => $group_id,
            ]);
        else
            $this->group()->create([
                'group_id' => $group_id,
            ]);
    }


    public function detachGroup(): void
    {
        if($this->group !== null)
            $this->group()->delete();
    }
    public function getImageAttribute($value){
        return $this::PATH.DIRECTORY_SEPARATOR.$value;
    }

}
