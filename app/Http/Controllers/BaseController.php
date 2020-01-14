<?php

namespace App\Http\Controllers;

abstract class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * BaseController constructor.
     * @param array|null $middleware
     */
    public function __construct(array $middleware = null)
    {
        $baseMiddleware = ['auth'];

        if ($middleware) {
            $baseMiddleware = array_merge($baseMiddleware, $middleware);
        }

        $this->middleware($baseMiddleware);
    }

}
