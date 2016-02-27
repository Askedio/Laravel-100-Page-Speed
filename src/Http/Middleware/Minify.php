<?php

namespace Askedio\Laravel100PageSpeed\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class Minify
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

 //echo config('minify.level');

        if ($this->isResponseObject($response) && $this->isHtmlResponse($response)) {
            $replace = [
              '/\>[^\S ]+/s'                                                        => '>',
              '/[^\S ]+\</s'                                                        => '<',
              '/([\t ])+/s'                                                         => ' ',
              '/^([\t ])+/m'                                                        => '',
              '/([\t ])+$/m'                                                        => '',
              '~//[a-zA-Z0-9 ]+$~m'                                                 => '',
              '/[\r\n]+([\t ]?[\r\n]+)+/s'                                          => "\n",
              '/\>[\r\n\t ]+\</s'                                                   => '><',
              '/}[\r\n\t ]+/s'                                                      => '}',
              '/}[\r\n\t ]+,[\r\n\t ]+/s'                                           => '},',
              '/\)[\r\n\t ]?{[\r\n\t ]+/s'                                          => '){',
              '/,[\r\n\t ]?{[\r\n\t ]+/s'                                           => ',{',
              '/\),[\r\n\t ]+/s'                                                    => '),',
              '~([\r\n\t ])?([a-zA-Z0-9]+)=\"([a-zA-Z0-9_\\-]+)\"([\r\n\t ])?~s'    => '$1$2=$3$4',
              '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/' => '',
              '/<!--(?!<!)[^\[>].*?-->/'                                            => '',
              '/\n/'                                                                => '',
              '/<\/li>/'                                                            => '',
            ];

            $response->setContent(preg_replace(array_keys($replace), array_values($replace), $response->getContent()));
        }

        return $response;
    }

    protected function isResponseObject($response)
    {
        return is_object($response) && $response instanceof Response;
    }

    protected function isHtmlResponse(Response $response)
    {
        return strtolower(strtok($response->headers->get('Content-Type'), ';')) === 'text/html';
    }
}
