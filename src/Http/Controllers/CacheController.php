<?php

namespace Askedio\Laravel100PageSpeed\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;

class CacheController extends Controller
{
    public function cache_js(Request $request, $file)
    {
        $_expires = 20160;

        switch ($file) {
        case 'analytics.js':
          $_remote_file = 'https://www.google-analytics.com/analytics.js';
        break;

        default:
           \App::abort(404);
        break;
      }

        if (!Cache::has($file)) {
            $_remote = file_get_contents($_remote_file);
            $_time = new \DateTime('now');
            Cache::put($file, [$_time, $_remote], $_expires);
        } else {
            $_cache = Cache::get($file);
            $_remote = $_cache[1];
            $_time = $_cache[0];
        }

        $response = Response::make($_remote, 200)
                                  ->header('Content-Type', 'text/javascript')
                                  ->header('Cache-Control', 'private, max-age='.$_expires)
                                  ->setLastModified($_time)
                                  ->setExpires(\Carbon\Carbon::now()->addMinutes($_expires));

        return $response;
    }
}
