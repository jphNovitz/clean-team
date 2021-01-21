<?php

namespace App\Controller\Room;

use App\Entity\Room;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;

class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $organisation = $this->getUser()->getOrganisation()->getId();

        $response = $this->get(EntityRepository::class)
            ->createQueryBuilder($searchDto, $entityDto, $fields, $filters);

        $response->leftJoin('entity.users', 'users')
            ->addSelect('entity, users');
        $response->where("entity.organisation = :organisation")
            ->setParameter('organisation', $organisation);
        return $response;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('number', 'N°'),
            TextField::new('area'),
            ArrayField::new('usersId'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {

        $id = $this->getUser()->getId();

        $addRoom = Action::new('addRoom', '', 'fa fa-plus')
            ->addCssClass(' text-success')
            ->displayIf(function ($entity) {
                return !in_array($this->getUser()->getId() ,$entity->getUsersId() );
            })
            ->linkToCrudAction('addRoom');

        $removeRoom = Action::new('removeRoom', '', 'fa fa-minus')
            ->addCssClass('text-danger')
            ->displayIf(function ($entity) {
                return in_array($this->getUser()->getId() ,$entity->getUsersId() );
            })
            ->linkToCrudAction('removeRoom');

        return $actions->add(Crud::PAGE_INDEX, $addRoom)
            ->add(Crud::PAGE_INDEX, $removeRoom);
    }

    public function addRoom(AdminContext $context, Request $request)
    {
        $id = $context->getRequest()->query->get('entityId');
        $entity = $this->getDoctrine()->getRepository(Room::class)->find($id);
        $entity->addUser($this->getUser());
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash("success", "chambre ajoutée");
        return $this->redirect($this->get(CrudUrlGenerator::class)->build()
            ->setAction(Action::INDEX)->generateUrl());

    }

    public function removeRoom(AdminContext $context, Request $request)
    {
        $id = $context->getRequest()->query->get('entityId');
        $entity = $this->getDoctrine()->getRepository(Room::class)->find($id);
        $entity->removeUser($this->getUser());
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash("danger", "chambre enlevée");
        return $this->redirect($this->get(CrudUrlGenerator::class)->build()
            ->setAction(Action::INDEX)->generateUrl());

    }

}
