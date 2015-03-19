October CMS User Facebook
==========================

RainLab.User extension to login and register with Facebook.

If you are not familiar and for better understanding of whole functionality, please read the documentation of RainLab.User too.

## Installation

1. Execute `composer install` to install the dependencies libraries. Skip this step if you installed it from the marketplace.  
2. Configure the _App ID_ and _App Secret_ on the settings page.
3. Add the Facebook Session component on your page or layout. NOTE: This component extends User's Session, so you don't need to use both.
4. Add `{% component 'facebookSession::fb-sdk' %}` to include facebook's SDK.
5. Add `{% component 'facebookSession::login-button' %}` anywhere on your page/layout.

Of course all snippets can be customized, they are used just to faster the development and to be used as a guide.

## Example
    
    {# Loads the facebook SDK #}
    {% component 'facebookSession::fb-sdk' %}
   
    {% if user %}
        Logged in as {{ user.name }} <a href="#" data-request="facebookSession::onLogout">Logout</a>
    {% else %}
        {% component 'facebookSession::login-button' %}
    {% endif %}