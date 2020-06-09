<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Entity\User;

class TaskController extends AbstractController
{
    /**
     * @Route("/", name="task")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $taskRepository = $em->getRepository(Task::class);
        $tasks = $taskRepository->findBy([], ['id' => 'desc']);

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @Route("/task/{id}", name="task.detail")
     */
    public function detail(Task $task)
    {
        if (!$task) {
            return $this->redirectToRoute('task');
        }

        return $this->render('task/detail.html.twig', [
            'task' => $task
        ]);
    }
}
