# Minify HTML & Cache 3rd Party Resources
This package will automatically minify your html code and provide a route for 3rd party resources like Google Analytics that have a short cache life.

# WARNING
The HTML minifier is very strict and may cause issues with your code. I've resolved all issues with an even stricter version, so you can too.

# Install

    composer require gcphost/laravel-100-page-speed
  

Register the provider

   Askedio\Laravel100PageSpeed\PageSpeedServiceProvider::class,
