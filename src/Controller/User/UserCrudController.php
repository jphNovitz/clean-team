<?php

namespace App\Controller\User;

use App\Controller\Contact\ContactController;
use App\Entity\Room;
use App\Entity\User;
use App\Service\CTMessenger;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class UserCrudController extends AbstractCrudController
{

    private $crudUrlGenerator;
    private  $messenger;

    public function __construct(CrudUrlGenerator $crudUrlGenerator, CTMessenger $messenger)
    {
        $this->crudUrlGenerator = $crudUrlGenerator;
        $this->messenger = $messenger;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        return $this->get(EntityRepository::class)
            ->createQueryBuilder($searchDto, $entityDto, $fields, $filters)
            ->where("entity.organisation = :organisation")
            ->setParameter(
                'organisation',
                $this->getUser()->getOrganisation()->getId()
            );
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstName', 'Prénom'),
            TextField::new('lastName', 'Nom'),
            ArrayField::new('getAreas', 'Zones'),
            ArrayField::new('getRoomsNr', 'Chambres'),
            //TextEditorField::new('description'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {

        $contact = Action::new('contact', 'Envoyer un message', 'fa fa-envelope')
            //->addCssClass('text-danger')
            ->displayIf(function ($entity) {
                return ($this->getUser()->getId() !== $entity->getId());
            })
            ->linkToCrudAction('contact')
           ;

        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->add(Crud::PAGE_INDEX, $contact);
    }

    public function contact(AdminContext $context, User $destination = null, Request $request)
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
            $to = $userFrom->getEmail();
            $message = $data["message"];
            if ($this->messenger->sendEmail($to, $from, $subject, $nameFrom, $message)) {
                $this->addFlash("success", "Message envoyé " . $userFrom->getId());
            } else {
                $this->addFlash("danger", "Message non envoyé " . $userFrom->getId());
            }
            //return $this->redirect($request->headers->get('referer'));
            return $this->redirect($this->get(CrudUrlGenerator::class)->build()
                ->setAction(Action::INDEX)->generateUrl());
            return $this->redirectToRoute('admin', [

            ]);
        }

        return $this->render('contact/contact_user_user.html.twig',
            [
                'form'=>$form->createView()
            ]);


        /* return $this->redirect($this->generateUrl('contact_user_user', [
                 'id' => $context->getRequest()->query->get('entityId')
             ]
         ));
         */
    }

}
