<?php
namespace Vuravel\Partials\Forms;

use Vuravel\Form\Form;
use Vuravel\Form\Components\{Input, Button};

class AuthForgotPasswordForm extends Form
{
	public $class = 'p-4 mx-auto';
	public $style = 'max-width:350px';

	protected $submitTo = 'password.email';

	public function components()
	{
		return [
			Input::form('Email')->name('email'),
			Button::form('Send password reset instructions')->submitsForm()
		];
	}

	public function rules()
	{
		return [
			'email' => 'required|email'
		];
	}

}