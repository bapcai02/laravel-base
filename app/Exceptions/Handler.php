<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('ajax/*') || $request->is('api/*') || $request->ajax()) {
            return $this->createApiErrorResponse($exception);
        }
        return parent::render($request, $exception);
    }

    private function createApiErrorResponse(Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $status = $exception->getCode();
            switch ($status) {
                case 400:
                    $errorMsg = __("message.system.bad_request");
                    break;
                case 401:
                    $errorMsg = __("message.system.unauthorized");
                    break;
                case 404:
                    $errorMsg = __("message.system.not_found");
                    break;
                default:
                    $status = 400;
                    $errorMsg = $exception->getMessage();
            }
        } else {
            if ($exception instanceof AuthorizationException) {
                $exception = $this->prepareException($this->mapException($exception));
                $status = $exception->getCode();
            } else {
                $status = 500;
            }
            $errorMsg = $exception->getMessage();
        }
        $response = [
            'success' => 0,
            'errors' => [
                'error_code' => 'E0003',
                'error_message' => $errorMsg,
            ]
        ];
        return response()->json($response, $status);
    }
}
