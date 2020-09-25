<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello")
     * @Route("/", name="homepage")
     */
    public function index(string $name = '')
    {
        $greet = '';
        if ($name) {
            $greet = sprintf('<h1>Hello, %s!</h1>', htmlspecialchars($name));
        }
        return new Response(<<<EOF
<html lang="ru">
    <body>
        $greet
        <img alt="under construction picture" src="/images/under-construction.gif" />
    </body>
</html>
EOF
        );
    }
}
