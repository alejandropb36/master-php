<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Entity\User;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $taskRepository = $em->getRepository(Task::class);

        $tasks = $taskRepository->findAll();
        foreach($tasks as $task) {
            echo $task->getUser()->getEmail() . ": " . $task->getTitle() . "<br>";
        }

        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        foreach($users as $user) {
            var_dump($user->getTasks());
        }

        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
