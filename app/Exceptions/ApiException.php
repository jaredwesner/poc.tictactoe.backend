<?php

namespace App\Exceptions;

use App\Http\Responses\StandardResponse;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException as FrameworkValidationException;
use Illuminate\Http\Response;

use Illuminate\Session\ExternalAPIException;


class ApiException extends Exception
{

    private $originalException;

    public function __construct(Exception $e)
    {
        $this->originalException = $e;
        parent::__construct($e->getMessage(), $e->getCode(), $e->getPrevious());
    }

    /**
     * Report or log an exception.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report()
    {

    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return StandardResponse
     */
    public function render($request)
    {

        // General
        $info = get_class($this->originalException);
        $errorCode = 500;
        $data = null;
        $exception = null;
        $exception_title = null;

        if ($this->originalException instanceof HttpResponseException) {
            $errorCode = $this->originalException->getCode();
        } elseif ($this->originalException instanceof FrameworkValidationException) {
            $errorCode = 400;
        } elseif ($this->originalException instanceof AuthenticationException) {
            $errorCode = 401;
            $this->message = "You do not have access to the system, please login";
            $info = "Unauthenticated";
        } elseif ($this->originalException instanceof TokenMismatchException) {
            $errorCode = 440;
        } elseif ($this->originalException instanceof ExternalAPIException) {
            $errorCode = $this->originalException->getCode();
        }

        $response = array(
            'ver' => '',
            'success' => false,
            'errorCode' => $errorCode,
            'message' => $this->message,
            'info' => $info,
            'exception' => $exception_title,
        );

        if (env('APP_DEBUG')) {
            $response['data']  = array(
                'message' => $this->originalException->getMessage(),
                'file' => $this->originalException->getFile(),
                'line' => $this->originalException->getLine(),
                'code' => $this->originalException->getCode(),
                'trace' => $this->originalException->getTraceAsString()
            );
        }

        return response()->json($response, $errorCode);
    }
}
