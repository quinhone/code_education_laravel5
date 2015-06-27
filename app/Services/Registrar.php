<?php namespace CodeCommerce\Services;

use CodeCommerce\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'address' => 'required|max:150',
			'neighborhood' => 'required|max:100',
			'city' => 'required|max:100',
			'state' => 'required|max:2|min:2',
			'postalcode' => 'required',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'address' => $data['address'],
			'neighborhood' => $data['neighborhood'],
			'city' => $data['city'],
			'state' => $data['state'],
			'postalcode' => $data['postalcode'],
			'password' => bcrypt($data['password']),
		]);
	}

}
