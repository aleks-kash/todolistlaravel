<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected function tokensMatch($request)
    {
        $token = $request->ajax()
            ? $request->header('X-CSRF-TOKEN')
            : $this->getTokenFromRequest($request);
//        var_dump([
////            $request->ajax(),
////            parent::tokensMatch($request),
//            'CSRF' => $request->header('X-CSRF-Token'),
//            'CSRF2' => $request->header('X-CSRF-TOKEN'),
////            $request->input('_token'),
//            $this->getTokenFromRequest($request)
//        ]);exit;


        return $request->session()->token() == $token;

//        return is_string($request->session()->token()) &&
//            is_string($token) &&
//            hash_equals($request->session()->token(), $token);


//        return parent::tokensMatch($request); // TODO: Change the autogenerated stub
    }
}
