<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class StandardResponse implements Responsable
{

    private $version;
    private $success;
    private $code;
    private $message;
    private $info;
    private $data;
    private $exception;

    public function __construct($data = null, $message = '', $info = '', $success = true, $code = 200, $exception = null)
    {

        $this->version = exec('git describe --tags');
        $this->success = $success;
        $this->code = $code;
        $this->message = $message;
        $this->info = $info;
        $this->data = $data;
        $this->exception = $exception;
    }

    public function toResponse($request)
    {
        $response = array(
            'ver' => $this->version,
            'success' => $this->success,
            'message' => $this->message,
            'info' => $this->info,
            'data' => $this->data
        );

        if (!empty($this->exception)) {
            $response = array_add($response, 'exception', $this->exception);
        }
  
        return response()->json($response, $this->code);
    }
}
