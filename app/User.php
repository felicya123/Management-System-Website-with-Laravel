<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id','fullname', 'position','division','dob', 'gender','email', 'password','address'
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    public function createUser($data){
        $this->fill([
            'user_id' => $data['user_id'],
            'fullname' => $data['name'],
            'division' =>$data['division'],
            'dob' =>$data['dob'],
            'gender' =>$data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address']
        ]);
        $this->save();
    }
    */
}
