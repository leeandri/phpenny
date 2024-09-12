<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use App\Exceptions\SessionException;

class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException("Session déjà active.");
        }

        if (headers_sent($filename, $line)) {
            throw new SessionException("En-têtes déjà envoyés. Pensez à activer l'output buffering. Données sorties du {$filename} - Ligne: {$line}");
        }

        session_start();

        $next();

        session_write_close();
    }
}
