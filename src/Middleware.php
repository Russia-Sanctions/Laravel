<?php

namespace RussiaSanctions\Laravel;

use Closure;
use Illuminate\Http\Request;
use RussiaSanctions\Assets;
use RussiaSanctions\Matcher;

/**
 * This middleware blanket blocks all requests from Russian or
 * Belarusian IP addresses and returns an HTML blocked error message.
 */
class Middleware
{
    /**
     * Instance of the RussiaSanctions IP Matcher
     *
     * @var Matcher
     */
    private $matcher;

    public function __construct()
    {
        $this->matcher = new Matcher();
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->matcher->matchIp($request->ip())) {
            return $next($request);
        } else {
            return response(Assets::getHtml(), 451);
        }
    }
}
