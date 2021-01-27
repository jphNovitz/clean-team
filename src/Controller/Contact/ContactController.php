<?php

namespace App\Controller\Contact;

use App\Controller\User\UserCrudController;
use App\Entity\User;
use App\Service\CTMessenger;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact/user/{id}", name="contact_user_user")
     * @Entity("user", expr="repository.findBy(['id'=>$to)")
     */
    public function index(User $destination = null, CTMessenger $messenger, Request $request) : Response
    {
        $userFrom = $this->getUser();
        $from = $userFrom->getEmail();
        $nameFrom = $userFrom->getFirstName() . ' ' . $userFrom->getLastName();
        $subject = $nameFrom . ' vous a envoyé un message';
        $to = $destination->getEmail();

        if ($messenger->sendEmail($to, $from, $subject, $nameFrom)) {
            $this->addFlash("success", "Message envoyé " . $userFrom->getId());
        } else {
            $this->addFlash("danger", "Message non envoyé " . $userFrom->getId());
        }
        return $this->redirect($request->headers->get('referer'));

    }
}
