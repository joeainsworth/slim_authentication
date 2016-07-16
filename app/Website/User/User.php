<?php

namespace Website\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
	protected $table = 'users';

	protected $fillable = [
		'email',
		'username',
		'password',
		'active',
		'active_hash',
		'remember_identifier',
		'remember_token',
	];

	public function getFullName() {
		if (!$this->firstname || !$this->lastname) {
			return null;
		} 

		return "{$this->firstname} {$this->lastname}";
	}

	public function getFullNameOrUsername() {
		return $this->getFullName() ?: $this->username;
	}
}