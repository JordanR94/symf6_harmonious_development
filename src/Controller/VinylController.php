<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['track' => 'Song 1', 'artist' => 'Artist 1'],
            ['track' => 'Song 2', 'artist' => 'Artist 2'],
            ['track' => 'Song 3', 'artist' => 'Artist 3'],
            ['track' => 'Song 4', 'artist' => 'Artist 4'],
            ['track' => 'Song 5', 'artist' => 'Artist 5'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if($slug){
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        }else{
            $title = 'All Titles';
        }

        return new Response($title);
    }


}