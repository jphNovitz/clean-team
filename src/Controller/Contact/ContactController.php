<?php

namespace App\Controller\Contact;

use App\Controller\User\UserCrudController;
use App\Entity\User;
use App\Service\CTMessenger;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    protected $crudUrlGenerator;

    public function __construct(CrudUrlGenerator $crudUrlGenerator)
    {
        $this->crudUrlGenerator  = $crudUrlGenerator;
    }

    /**
     * @Route("/contact/user/{id}", name="contact_user_user")
     * @Entity("user", expr="repository.findBy(['id'=>$to)")
     */
    public function index(User $destination = null, CTMessenger $messenger, Request $request) : Response
    {
        $defaultDatas = ["message" => "message"];
        $form = $this->createFormBuilder($defaultDatas)
        ->add('message', TextareaType::class)
        ->add('send', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $userFrom = $this->getUser();
            $from = $userFrom->getEmail();
            $nameFrom = $userFrom->getFirstName() . ' ' . $userFrom->getLastName();
            $subject = $nameFrom . ' vous a envoyé un message';
            $to = $destination->getEmail();
            $message = $data["message"];
            if ($messenger->sendEmail($to, $from, $subject, $nameFrom, $message)) {
                $this->addFlash("success", "Message envoyé " . $userFrom->getId());
            } else {
                $this->addFlash("danger", "Message non envoyé " . $userFrom->getId());
            }
            //return $this->redirect($request->headers->get('referer'));
            return $this->redirectToRoute('admin', [

            ]);
            /*return $this->redirect($this->crudUrlGenerator
                ->build()
                ->setController(UserCrudController::class)
                //->setAction(Action::INDEX)
                ->generateUrl(), 301);
*/
        }

        return $this->render('contact/contact_user_user.html.twig',
        [
            'form'=>$form->createView()
        ]);

    }
}
