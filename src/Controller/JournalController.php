<?php

namespace App\Controller;

use App\Entity\Journal;
use App\Entity\Room;
use App\Entity\Task;
use App\Repository\JournalRepository;
use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JournalController extends AbstractController
{
    /**
     * @Route("/journal/action/{room}/{task}", name="journal_action")
     */
    public function index(Room $room, Task $task, Request $request)
    {
        $referer = $request->headers->get('referer');

        $journal = new Journal();

        $journal->setStatus(1);
        $journal->setRoom($room);

        $journal->setTask($task);
//        dd($journal);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($journal);
        $manager->flush();
        return $this->redirect($referer);
    }

    /**
     * @Route("/journal/task/{room}/{task}", name="journal_task_by_room")
     */
    public function tasksByRoom($room, $task, Request $request, JournalRepository $journalRepository)
    {
        return $this->render('_template_parts/task_infos.html.twig',[
            'journalLine'=>$journalRepository->findBy(['room'=>$room, 'task'=>$task], ['id'=>'desc'], 1),
            'room' => $room,
            'task' => $task
    ]);


    }
}
