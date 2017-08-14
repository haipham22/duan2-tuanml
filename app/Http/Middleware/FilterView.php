<?php

namespace App\Http\Middleware;

use Closure;

class FilterView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_active('post'))
        {
            $models = $this->getViewedPosts();
            if (!is_null($models))
            {
                $models = $this->cleanExpiredViews($models);
                $this->storePosts($models);
            }
        }
        return $next($request);
    }

    /**
     * Get session view from post
     * @return mixed
     */
    private function getViewedPosts()
    {
        return request()->session()->get('viewed_posts', null);
    }

    /**
     * Clean session when expired time
     *
     * @param $model
     * @return array
     */
    private function cleanExpiredViews($model)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($model, function ($timestamp) use ($time, $throttleTime) {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    /**
     * Save session for post
     *
     * @param $model
     * @internal param $posts
     */
    private function storePosts($model)
    {
        request()->session()->put('viewed_posts', $model);
    }

}
