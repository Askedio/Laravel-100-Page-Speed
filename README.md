# Minify HTML & Cache 3rd Party Resources
This package will automatically minify your html code and provide a route for 3rd party resources like Google Analytics that have a short cache life.

# WARNING
The HTML minifier is very strict and may cause issues with your code. I've resolved all issues with an even stricter version, so you can too.

# Install

    composer require askedio/laravel-100-page-speed:dev-master
  

Register the provider


    Askedio\Laravel100PageSpeed\PageSpeedServiceProvider::class,

# Routes
You now have a /cache/ route with analytics.js by default

    /cache/annalytics.js

This will temporarily cache the script in the clients session. It's not to be used for heavy scripts. This is required for a 100 score with Google Analytics

# Minifying
All html routes are automatically minified. There will be a config file to control the level of minification (if interest is shown in this project).
