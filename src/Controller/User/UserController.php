<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $repo;

    public function __construct(ContainerInterface $container)
    {
        $this->repo = $container->get('doctrine.orm.default_entity_manager')
            ->getRepository('App:User');

    }

    /**
     * @Route("/users", name="user")
     */
    public function index(): Response
    {

        return $this->render('user/index.html.twig', [
            'users' => $this->repo->list(),
        ]);
    }
}
