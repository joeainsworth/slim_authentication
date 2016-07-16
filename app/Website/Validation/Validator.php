<?php

namespace Website\Validation;

use Violin\Violin;
use Website\User\User;

class Validator extends Violin {
	protected $user;

	public function __construct(User $user) {
		$this->user = $user;

		$this->addFieldMessages([
			'email' => [
				'uniqueEmail' => 'That email is already in use.'
			],
			'username' => [
				'uniqueUsername' => 'That username is already in use.'
			]
		]);
	}

	public function validate_uniqueEmail($value, $input, $args) {
		$user = $this->user->where('email', $value);

		if ($user->count()) {
			return false;
		}

		return true;
	}

	public function validate_uniqueUsername($value, $input, $args) {
		$user = $this->user->where('username', $value);

		if ($user->count()) {
			return false;
		}

		return true;
	}
}