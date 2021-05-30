<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

		public function insert() : bool {
			if($this->name === '' || $this->email === '' || $this->password === '') {
				// Case params empty return false
				return false;
			} else {
				// Save user
				$this->save();
				return true;
			}
		}

		/**
		 * Remove user function, comprobe email 
		 * exist and is not empty
		 */
		public function remove() : bool {
			if($this->email === '') {
				// Case email empty return false
				return false;
			} else {
				// Delete user
				if($this::where('email', $this->email)->first() != null) return false;
				$this->delete();
				return true;
			}
		}

		/**
		 * Modify user function, only works when you pass a new 
		 * user as param, else use insert() or save() [last not recommended].
		 */
		public function modify($user = null) : bool {
			if($this->email === '') {
				return false;
			} elseif($user->email === null) {
				return false;
			} elseif($user->email === '') {
				return false;	
			} elseif($user->email != $this->email) {
				return false;
			} else {
				// TRUE CASE
				if($user->name != "") $this->name = $user->name;
				if($user->password != "") $this->password = $user->password;
				$user->save();
				return true;
			}
		}
}

