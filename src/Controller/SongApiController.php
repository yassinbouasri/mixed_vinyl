<?php

declare(strict_types=1);


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class SongApiController extends AbstractController
{
    #[Route('/api/song/{id<\d+>}', methods: 'GET')]
    public function getSong(int $id): Response
    {
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'http://symfonycasts.s3.amazonaws.com/sample.mp3'
        ];
        
        return $this->json($song);
    }
}