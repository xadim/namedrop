<?php
    //use models\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Generate a login URL
Route::get('/', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    $login_link = $fb
            ->getRedirectLoginHelper()
            ->getLoginUrl('http://namedrop.dev/facebook/callback', ['email', 'user_events']);
    return view('feed', ['login_link' => $login_link]);
    //echo '<a href="' . $login_link . '">Log in with Facebook</a>';
});


// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler

        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email,picture,gender,link,locale,first_name,last_name,location,hometown,address');
        /* Other fields
        "id" => "396921363837666"
        "email" => "xadimjaxate@gmail.com"
        "first_name" => "Hadim"
        "gender" => "male"
        "last_name" => "Jahate"
        "link" => "https://www.facebook.com/app_scoped_user_id/396921363837666/"
        "locale" => "en_US"
        "name" => "Hadim Jahate"
        "timezone" => -4
        "updated_time" => "2015-07-09T18:31:37+0000"
        "verified" => true
        */
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }
//    dd($response);
    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection

    $facebook_user = $response->getGraphUser();
    //dd($response);

    $user = new \App\models\User;
    //verify if user exists before insert it
    $user_exist = $user::where('email', '=', $facebook_user['email'])->first();
    if ($user_exist === null) {
        $user->name = $facebook_user['name'];
        $user->email = $facebook_user['email'];
        $user->facebook_user_id = $facebook_user['id'];
        $user->photo = $facebook_user['picture']['url'];
        $user->first_name = $facebook_user['first_name'];
        $user->last_name = $facebook_user['last_name'];
        $user->gender = $facebook_user['gender'];
        $user->locale = $facebook_user['locale'];
        $user->link = $facebook_user['link'];
        $user->password = Hash::make('awesome');
        $user->access_token = $token;
        $user->save();
        $last_id = $user->id;
    }

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    //$user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel either it exists or just created
    if ($user_exist) {
        Auth::login($user_exist);
    }
    else
    {
        $user_exist = $user::where('id', '=', $last_id)->first();
        Auth::login($user_exist);
    }

    //return redirect('/')->with('message', 'Welcome '.$facebook_user['name'].' successfully logged in with Facebook');

    return redirect('/');
    //return redirect()->route('dashboard.index');
});




$router->bind('dashboard', function($email){
    /**
    *
    * retrieve the first email matching the query in the db
    */

    return \App\models\User::whereEmail($email)->first();
});

Route::resource('dashboard', 'DashboardController');

Route::get('profile', function () {
    return view('profile');
});
