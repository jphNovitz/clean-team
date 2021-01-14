<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $this->em = $entityManager;

    }

    /**
     * @Route("/profil", name="user_profile")
     */
    public function index(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $form = $this->createForm(UserFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            try {
                $user = $form->getData();
                $this->em->persist($user);
                $this->em->flush();
                $this->addFlash('success', 'Modification effectuée');
            } catch (\Exception $exception ){
                $this->addFlash('danger', 'Oups !');
            }
            return $this->redirectToRoute('user_profile');
        endif;

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
