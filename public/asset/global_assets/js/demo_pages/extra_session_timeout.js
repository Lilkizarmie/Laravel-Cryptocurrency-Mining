/* ------------------------------------------------------------------------------
 *
 *  # Session timeout
 *
 *  Demo JS code for extra_session_timeout.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var SessionTimeout = function() {


    //
    // Setup module components
    //

    // Session timeout
    var _componentSessionTimeout = function() {
        if (!$.sessionTimeout) {
            console.warn('Warning - session_timeout.min.js is not loaded.');
            return;
        }

        // Session timeout
        $.sessionTimeout({
            heading: 'h5',
            title: 'Session Timeout',
            message: 'Your session is about to expire. Do you want to stay connected?',
            ignoreUserActivity: true,
            warnAfter: 10000000,
            redirAfter: 3000000,
            keepAliveUrl: '/',
            redirUrl: './',
            logoutUrl: '../app/user/logout'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentSessionTimeout();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    SessionTimeout.init();
});
