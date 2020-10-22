<?php

namespace App\Controller;

use App\Content;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController
{

    public function index()
    {
        return new JsonResponse(
            ['msg' => 'hello world'],
        );
    }
}
