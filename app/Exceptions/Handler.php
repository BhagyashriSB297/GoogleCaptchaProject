<?php

namespace App\Exceptions;
use App\Exceptions\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Mail;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    // public function register(): void
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }

    public function report(Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            $this->sendErrorReport($exception);
        }

        parent::report($exception);
    }

    private function sendErrorReport(ModelNotFoundException $exception)
    {
        // $data = [
        //     'exception' => $exception,
        // ];

        // Mail::send('emails.error_report', $data, function ($message) {
        //     $message->to('poojabhamare296@gmail.com')
        //         ->subject('Error Report');
        // });
    }

    public function render($request, Throwable $exception)
    {
        // dd($exception instanceof ModelNotFoundException);
        // if ($exception instanceof ModelNotFoundException) {

            $data = [
                'exception' => $exception,
            ];

            Mail::send('emails.error_report', $data, function ($message) {
                $message->to('poojabhamare296@gmail.com')
                    ->subject('Error Report');
            });
            return redirect()->route('error'); // Redirect to the custom error page
        // }

        // // return parent::render($request, $exception);

         
    }
}
