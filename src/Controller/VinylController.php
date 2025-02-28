<?php

declare(strict_types=1);


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

class VinylController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(Environment $twig): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        
        $html = $twig->render('vinyl/home.html.twig',[
            'tracks' => $tracks,
        ]);

        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'browse')]
    public function browse($slug = null)
    {
        $genre = $slug ? \symfony\component\string\u(str_replace('-', ' ', $slug))->title() : null;

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}