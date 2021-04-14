<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TestController
{
    public function hello(): Response
    {
        return new Response(
            '<html><body>Hello, Anton</body></html>'
        );
    }
}