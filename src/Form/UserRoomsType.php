<?php

namespace App\Form;

use App\Entity\Area;
use App\Entity\Room;
use App\Entity\User;
use App\Repository\RoomRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRoomsType extends AbstractType
{

    private $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $organisation = $options['organisation'];

        $builder
            ->add('rooms', EntityType::class, [
                'class' => 'App\Entity\Room',
                'query_builder' => function (EntityRepository $er) use ($organisation){
                    return $er->createQueryBuilder('r')
                        ->select('r')
                        ->andWhere('r.organisation = :organisation')
                        ->setParameter('organisation', $organisation)
                        ->orderBy('r.id', 'ASC');
                },
                'group_by' => 'area.name',
                'choice_attr' => function(Room $room) {

                    return ['data-group' => $room->getArea()];
                },
//                'group_by' => 'AreaType',
                'required' => false,
                'expanded' => true,
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
        $resolver->setRequired(array(
            'organisation'
        ));
    }
}
