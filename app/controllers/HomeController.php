<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	// création d'une vue de création d'ajout d'utilisateur ...
	public function showCreate()
	{
		return View::make('test/createusertest'); // ... de test
	}
	

	// Méthode de cération d'utilisateur
	public function createUser()
	{
		Validator::extend('comparePassword', function ($attribute, $value, $parameters) 
		{			
			return ($parameters[0] == $value);
		});
		
		$signupPassword = Input::get('signupPassword');

		// validate the info, create rules for the inputs
		$rules = array(
			'signupName' 	=> 'required|alphaNum|min:3', // name can only be alphanumeric and has to be greater than 4 characters
			'signupEmail'    => 'required|email', // make sure the email is an actual email
			'signupPassword' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
			'confirmedSignupPassword' => 'required|comparePassword:'.Input::get('signupPassword')
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('signup')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 
		else {			
			$pass = Input::get('signupPassword');
			$data = [
				'pseudo' => Input::get('signupName'),
				'name' => Input::get('signupName'),
				'mail' => Input::get('signupEmail'),				
				'password' => Hash::make($pass),
			];
			
			User::create($data);
			
			// create our user data for the authentication
			$userdata = array(
				'pseudo'		=> Input::get('signupName'),
				//'mail' 	=> Input::get('mail'), // Authentification par eMail
				'password' 	=> Input::get('signupPassword'),
			);
			
			Auth::attempt($userdata);
			
			return Redirect::to('/user/' . Input::get('signupName')); // Return sur la page de test de table
		}
	}
	
	// Création d'une vue de login ...
	public function showLogin()
	{
		// show the form
		return View::make('test/logintest'); // ... de test
	}

	// Méthode de login
	public function doLogin()
	{
	// validate the info, create rules for the inputs
		$rules = array(
			'signinUsername' 	=> 'required|alphaNum|min:4', // name can only be alphanumeric and has to be greater than 4 characters
			//'mail'    => 'required|email', // make sure the email is an actual email
			'signinPassword' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('signin') // Page de login de test
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('signinPassword')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'pseudo'		=> Input::get('signinUsername'),
				//'mail' 	=> Input::get('mail'), // Authentification par eMail
				'password' 	=> Input::get('signinPassword'),
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				return Redirect::to('/user/' . $userdata['pseudo']); // Return sur la page de test de table
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('signin'); // Page de login de test

			}

		}
	}
	
	// Méthode de logOut
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('/'); // redirect the user to the login screen
	}
}
