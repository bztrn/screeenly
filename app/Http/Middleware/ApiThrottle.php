<?php

namespace Screeenly\Http\Middleware;

use Closure;
use Illuminate\Contracts\Cache\Repository as Cache;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class ApiThrottle
{
    /**
     * Cache Implementation.
     *
     * @var Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Create a new filter instance.
     *
     * @param Application $app
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */

    /**
     * Source: http://fideloper.com/laravel-http-middleware.
     */
    public function handle($request, Closure $next)
    {
        $limit = config('api.ratelimit.requests');
        $time = config('api.ratelimit.time');

        // Rate limit by IP address
        $key = sprintf('api:%s', $request->get('key'));

        // Add if doesn't exist
        $this->cache->add($key, 0, $time);

        // Add to count
        $count = $this->cache->increment($key);

        if ($count > $limit) {
            throw new TooManyRequestsHttpException($time * 60, 'Rate limit exceed.');
        }

        return $next($request);
    }
}
