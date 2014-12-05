<?php namespace Ebussola\Userfacebook\Components;

use Cms\Classes\ComponentBase;
use eBussola\Userfacebook\Models\SocialIds;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Auth;
use DB;

class FacebookSession extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'FacebookSession Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * Executed when this component is first initialized, before AJAX requests.
     */
    public function init()
    {
        $this->addJs('assets/js/min/user-facebook-min.js');
    }

    public function onLoginWithFacebook() {
        $fb_js = new FacebookJavaScriptLoginHelper();
        $response = (new FacebookRequest($fb_js->getSession(), 'GET', '/me'))->execute();
        /** @var GraphObject $user */
        $fb_user = $response->getGraphObject();

        $social_ids = SocialIds::where('facebook_id', $fb_user->getProperty('id'))->first();
        if (!$social_ids) {
            if ($social_ids->user) {
                $user = $social_ids->user;
            } else {
                $password = uniqid();
                $user = Auth::register([
                    'name' => $fb_user->getProperty('name'),
                    'email' => $fb_user->getProperty('email'),
                    'username' => $fb_user->getProperty('email'),
                    'password' => $password,
                    'password_confirmation' => $password
                ], true);
            }

            if ($user) {
                $social_ids = new SocialIds();
                $social_ids->user_id = $user->id;
                $social_ids->facebook_id = $fb_user->getProperty('id');
                $social_ids->save();
            }
        } else {
            $user = $social_ids->user;
        }

        Auth::login($user, true);
    }

}