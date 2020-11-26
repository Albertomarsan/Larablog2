<?php

namespace App\Exceptions;

use App\Post;
use Exception;

class LimitPostException extends Exception
{

    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view('errors.LimitPostError', [], 500);
    }
}
