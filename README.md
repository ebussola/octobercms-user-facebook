October CMS User Facebook
==========================

RainLab.User extension to login and register with Facebook.

## Installation

1. Execute `composer install` to install the dependencies libraries. Skip this step if you installed it from the marketplace.  
2. Override the config file creating an identical plugin's config.php on config/ebussola/userfacebook/config.php and setting the parameters for your need.
3. Add the Facebook Session component on your page or layout. NOTE: This component extends User's Session, so you don't need to use both.
4. Add `{% component 'facebookSession::fb-sdk' %}` to include facebook's SDK.
5. Add `{% component 'facebookSession::login-button' %}` anywhere on your page/layout.

Of course all snippets can be customized, they are only to fast development and to be used as a guide.