<?php

use Vuravel\Library\Forms\{AuthLoginForm, AuthRegisterForm, AuthInvitationForm, AuthForgotPasswordForm};

Route::middleware('web')->group(function(){


	Route::middleware('guest')->group(function(){

		Route::group(['extends' =>'vuravel::app'], function(){

			//Route::vuravel('login', AuthLoginForm::class)->name('login');

			//Registration by invitation
			//Route::vuravel('register/{token}', AuthRegisterForm::class)->name('register');
			//Normal Registration
			//Route::vuravel('register', AuthRegisterForm::class)->name('register');

			//Route::vuravel('password/reset', AuthForgotPasswordForm::class)->name('password.request');
		});

	});

	Route::middleware(['auth','verified'])->group(function(){

		Route::group(['extends' => 'vuravel-library::app-account'], function(){

			//Route::vuravel('invite-form', AuthInvitationForm::class)->name('invite-form');

			/* Pick and choose
			Route::vuravel('profile/update', ProfileUpdateForm::class)
				->name('profile.update');

			Route::vuravel('account/change-name-form', AccountChangeNameForm::class)
    			->name('account.change-name');

			Route::vuravel('account/change-email-form', AccountChangeEmailForm::class)
    			->name('account.change-email');

    		Route::vuravel('account/change-password-form', AccountChangePasswordForm::class)
    			->name('account.change-password');
    		*/
		});
	});

});
