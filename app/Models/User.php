<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use  HasFactory, Notifiable,HasRoles;

    protected $appends = ['text'];
    public function getTextAttribute()
    {
        return $this->name;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
        'role_name' => 'array'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    // set hash password

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    // start Relation

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank::class,'user_id');
    }

    public function schedule()
    {
        return $this->hasOne(AdvertiseSchedule::class, 'user_id');
    }

    public function media()
    {
        return $this->morphOne(Media::class,'mediable');
    }



    //
    public function examinationRecords (){
        return $this->hasMany(ExaminationRecord::class,'user_id');
    }

    public function purchaseReturns (){
        return $this->hasMany(PurchaseReturn::class,'user_id');
    }

}
