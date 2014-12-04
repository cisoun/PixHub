<?php

class UserController extends BaseController {
	
	// création d'une vue de création d'ajout d'utilisateur ...
	public function showCreate()
	{
		return View::make('test/createusertest'); // ... de test
	}
	
	// Méthode de cération d'utilisateur
	public function createUser()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'pseudo' 	=> 'required|alphaNum|min:4', // name can only be alphanumeric and has to be greater than 4 characters
			'mail'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('test/createusertest')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} 
		else {			
			$pass = Input::get('password');
			$user = [
				'name' => Input::get('name'),
				'pseudo' => Input::get('pseudo'),
				'mail' => Input::get('mail'),
				'site' => Input::get('site'),
				'location' => Input::get('location'),
				'description' => Input::get('description'),
				'cover' => '-', // En 'dur' car pas de champs dans le formulaire de test.
				'password' => Hash::make($pass),
			];
			
			User::create($user);
			
			return Redirect::to('test/tablestest');
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
			//'name' 	=> 'required|alphaNum|min:3', // name can only be alphanumeric and has to be greater than 4 characters
			'mail'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('test/logintest') // Page de login de test
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'mail' 	=> Input::get('mail'), // Authentification par eMail
				'password' 	=> Input::get('password'),
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				return Redirect::to('test/tablestest'); // Return sur la page de test de table
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('test/logintest'); // Page de login de test

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
