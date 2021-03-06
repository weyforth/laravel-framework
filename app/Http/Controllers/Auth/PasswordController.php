<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	use ResetsPasswords;

	protected $registrar;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(
		Guard $auth,
		PasswordBroker $passwords,
		Registrar $registrar
	) {
		parent::__construct();
		$this->resolve();

		$this->middleware('guest');
	}

	public function redirectPath(){
		return $this->registrar->homeRoute();
	}

	public function getEmail(){
		return $this->view('auth.password');
	}

}
