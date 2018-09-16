<?php

namespace App\Exceptions;

use App\Http\Responses\StandardResponse;
use Throwable;

class ValidationException extends ApiException
{

    private $validationErrors;
    public $message;
    public $code;
    public $previous;

    public function __construct(array $validationErrors = null, $message = "", $code = 400, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
        $this->validationErrors = $validationErrors;
        $this->previous = $previous;
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
        return new StandardResponse($this->validationErrors, $this->message, "Validation Exception", false, $this->code, $this->previous);
    }
}
