<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       
         return parent::render($request, $exception);

        // //  return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        // $message = 'co loi xay ra';
        // $code = 400;
        // switch (true){
        //     case $exception instanceof AuthorizationException :
        //         $message = 'You must login';
        //         $code = 401;
        //         break;
        //     case $exception instanceof ModelNotFoundException :
        //          $message = 'We can not find what you are looking for';
        //          $code = 404;
        //          break; 
        //     default:
        //         $message  = $exception->getMessage();
        //         $code = $exception->getCode();
        //         break ;
        // }
        // return response()->json(['error' => $message], $code);
    }
}
