<?php namespace eBussola\UserFacebook;

use Facebook\FacebookSession;
use System\Classes\PluginBase;
use Config;

/**
 * UserFacebook Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * @var array Plugin dependencies
     */
    public $require = [
        'RainLab.User'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'UserFacebook',
            'description' => \Lang::get('ebussola.userfacebook::lang.plugin.description'),
            'author' => 'eBussola',
            'icon' => 'icon-facebook'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     */
    public function registerComponents()
    {
        return [
            '\eBussola\Userfacebook\Components\FacebookSession' => 'facebookSession'
        ];
    }

    public function register()
    {
        require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot()
    {
        FacebookSession::setDefaultApplication(Config::get('ebussola.userfacebook::facebook.app_id'), Config::get('ebussola.userfacebook::facebook.app_secret'));

        \RainLab\User\Models\User::extend(function (\RainLab\User\Models\User $model) {
            $model->hasOne['social_ids'] = ['\eBussola\Userfacebook\Models\SocialIds'];
        });
    }

}
