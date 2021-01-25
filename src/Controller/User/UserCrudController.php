<?php

namespace App\Controller\User;

use App\Entity\Room;
use App\Entity\User;
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
use Symfony\Component\HttpFoundation\Request;

class UserCrudController extends AbstractCrudController
{
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
            ->linkToCrudAction('contact');

        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->add(Crud::PAGE_INDEX, $contact);
    }

    public function contact(AdminContext $context, Request $request)
    {

        $this->addFlash("success", "TEST" . $context->getRequest()->query->get('entityId'));
        return $this->redirect($this->get(CrudUrlGenerator::class)->build()
            ->setAction(Action::INDEX)->generateUrl());

    }

}
