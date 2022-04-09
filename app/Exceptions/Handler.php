<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use App\Traits\ApiResponser;
use Asm89\Stack\CorsService;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        $response = $this->handleException($request, $exception);

        return $response;
    }

    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            if ($request->expectsJson()) {
                $errors = $exception->errors();
                return response()->json(
                    [
                        "errors" => $errors,
                        "message" => reset($errors),
                    ],
                    422
                );
            }
        }

        if ($exception instanceof QueryException) {
            $code = $exception->errorInfo[1];
            $exception;
            if ($code == 1451) {
                return $this->errorResponse(
                    "No se puede eliminar el recurso porque está relacionado con otro.",
                    409
                );
            }
            if ($code == 1452) {
                return $this->errorResponse(
                    "No existe el recurso con el que se intenta relacionar.",
                    409
                );
            }
        }

        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse(
                $exception,
                $request
            );
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse(
                "No existe ninguna instancia de {$model} con el id especificado.",
                404
            );
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse(
                "No posee los privilegios necesarios para aceder a este sitio.",
                403
            );
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse(
                "No se encontró la URL especificada.",
                404
            );
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse(
                "El metodo especificado en la peticion no es valido.",
                405
            );
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse(
                $exception->getMessage(),
                $exception->getStatusCode()
            );
        }

        if ($exception instanceof QueryException) {
            $code = $exception->errorInfo[1];
            if ($code == 1451) {
                return $this->errorResponse(
                    "No se puede eliminar el recurso porque está relacionado con otro.",
                    409
                );
            }
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()
                ->back()
                ->withInput($request->input());
        }

        if (config("app.debug")) {
            return parent::render($request, $exception);
        }

        return $this->errorResponse(
            "Falla inesperada.Intentelo más tarde",
            500
        );
    }

    protected function convertValidationExceptionToResponse(
        ValidationException $e,
        $request
    ) {
        $errors = $e->validator->errors()->getMessages();

        if ($this->isFrontend($request)) {
            return $request->ajax()
                ? response()->json($errors, 422)
                : redirect()
                    ->back()
                    ->withInput($request->input())
                    ->withErrors($errors);
        }

        return $this->errorResponse($errors, 422);
    }

    protected function unauthenticated(
        $request,
        AuthenticationException $exception
    ) {
        if ($this->isFrontend($request)) {
            return redirect()->guest("login");
        }
        return $this->errorResponse("No autenticado", 401);
    }

    private function isFrontend($request)
    {
        return $request->acceptsHtml() &&
            collect($request->route()->middleware())->contains("web");
    }
}
