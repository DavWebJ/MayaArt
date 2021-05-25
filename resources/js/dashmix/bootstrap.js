/*
 *  Document   : bootstrap.js
 *  Author     : pixelcave
 *  Description: Import global dependencies
 *
 */

/*
 ********************************************************************************************
 *
 * If you would like to use webpack to handle all required core JS files, you can uncomment
 * the following imports and window assignments to have them included in the compiled
 * dashmix.app.min.js as well.
 *
 * After that change, you won't have to include dashmix.core.min.js in your pages any more
 *
 *********************************************************************************************
 */

// Import all vital core JS files..
// import 'bootstrap';
// import 'popper.js';
// import 'jquery.appear';
// import 'jquery-scroll-lock';
window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ..and assign to window the ones that need it
window.$ = window.jQuery  = jQuery;
window.SimpleBar          = SimpleBar;
window.Cookies            = Cookies;
