/**
 * Created by PUBLICIW on 04/12/14.
 */

var userFacebook = (function($) {

    var uid;
    var accessToken;
    var status;

    var getLoginStatus = function(options) {
        options = $.extend({
            success: function() {},
            error: function() {}
        }, options);

        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                // the user is logged in and has authenticated your
                // app, and response.authResponse supplies
                // the user's ID, a valid access token, a signed
                // request, and the time the access token
                // and signed request each expire
                uid = response.authResponse.userID;
                accessToken = response.authResponse.accessToken;
                status = response.status;

                options.success();

            } else if (response.status === 'not_authorized') {
                // the user is logged in to Facebook,
                // but has not authenticated your app
                status = response.status;

                options.error();

            } else {
                options.error();
            }
        });
    };

    return {
        onLoginWithFacebook: function() {
            getLoginStatus({
                success: function() {

                    $.request('facebook_session::onLoginWithFacebook', {
                        success: function() {
                            location.reload(true);
                        }
                    })

                },

                error: function() {

                }
            });
        }
    };

})(jQuery);