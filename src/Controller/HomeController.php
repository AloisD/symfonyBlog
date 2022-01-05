<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    #[Route('/categories/{slug}', name: 'posts_by_category')]
    public function index(PostRepository $blogPosts, PaginatorInterface $paginator, Request $request, ?string $slug = null): Response
    {
        $pagination = $paginator->paginate(
            $blogPosts->getListQuery($slug),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('home/index.html.twig', ['pagination' => $pagination]);
    }
}
