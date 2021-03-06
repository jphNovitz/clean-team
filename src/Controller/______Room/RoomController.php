<?php

namespace App\Controller\Room;

use App\Entity\Room;
use App\Form\RoomType;
use App\Form\UserRoomsType;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chambre")
 */
class RoomController extends AbstractController
{
    /**
     * @Route("/{u}", name="room_index", methods={"GET"})
     */
    public function index(RoomRepository $roomRepository, $u = null): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($u == 'me') $user = $this->getUser()->getId();
            else $user = null;



        return $this->render('room/index.html.twig', [
            'rooms' => $roomRepository->findRooms($user),
        ]);
    }

    /**
     * @Route("/mes-chambres", name="room_user", methods={"GET", "POST"})
     */
    public function myRooms(Request $request, EntityManagerInterface $manager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $form = $this->createForm(UserRoomsType::class, $user, ['organisation' => $user->getOrganisation()]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) :
            try {
                $manager->flush();
                $this->addFlash('success', 'Chambres modifiées !');
            } catch (\Exception $e) {
                $this->addFlash('dangere', 'Il y a eu une erreur');
            }
        endif;
        return $this->render('room/user-rooms.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/new", name="room_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            return $this->redirectToRoute('room_index');
        }

        return $this->render('room/new.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_show", methods={"GET"})
     */
    public function show(Room $room): Response
    {
        return $this->render('room/show.html.twig', [
            'room' => $room,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="room_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Room $room): Response
    {
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('room_index');
        }

        return $this->render('room/edit.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Room $room): Response
    {
        if ($this->isCsrfTokenValid('delete' . $room->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($room);
            $entityManager->flush();
        }

        return $this->redirectToRoute('room_index');
    }


}
