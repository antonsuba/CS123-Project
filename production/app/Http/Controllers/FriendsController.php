<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

require_once __DIR__ . '/Facebook/autoload.php';

class FriendsController extends Controller
{
    //
	$fb = new Facebook\Facebook([
		'app_id' => '1822295657985665',
		'app_secret' => '1d1aa281bc6a0bb691614f7203a92c3b',
		'default_graph_version' => 'v2.8',
	]);
		
	$fb = new Facebook\Facebook([/* . . . */]);
	
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['user_friends', 'read_custom_friendlists']; // optional
	$loginUrl = $helper->getLoginUrl('http:// /login-callback.php', $permissions);

	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	
	# login-callback.php
	$fb = new Facebook\Facebook([/* . . . */]);

	$helper = $fb->getRedirectLoginHelper();
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (isset($accessToken)) {
	  // Logged in!
	  $_SESSION['facebook_access_token'] = (string) $accessToken;

	  // Now you can redirect to another page and use the
	  // access token from $_SESSION['facebook_access_token']
	}
	} elseif ($helper->getError()) {
	// The user denied the request
	exit;	
	}
	
	// OAuth 2.0 client handler
	$oAuth2Client = $fb->getOAuth2Client();

	// Exchanges a short-lived access token for a long-lived one
	$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken('{access-token}');
	
	$fb = new Facebook\Facebook([/* . . . */]);

	// Sets the default fallback access token so we don't have to pass it to each request
	$fb->setDefaultAccessToken('{access-token}');

	try {
	  $response = $fb->get('/me/friendlists');
	  $userNode = $response->getGraphUser();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	echo 'Logged in as ' . $userNode->getName();
}
