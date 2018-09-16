<?php

namespace App\Exceptions;

use App\Http\Responses\StandardResponse;

class UserAccessException extends ApiException
{
    public $user_access_error;
    public $user_message;
    public $code;

    public function __construct(array $user_access_error = null, $message, $code = 401, Throwable $previous = null)
    {
        $this->user_access_error = $user_access_error;
        $this->user_message = $message;
        $this->code = $code;
        parent::__construct($this);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return StandardResponse
     */
    public function render($request)
    {
        return new StandardResponse($this->user_access_error, $this->user_message, "Access exception", false, $this->code);
    }
}
