<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Task;
use App\Entity\User;
use App\Form\TaskType;
use Symfony\Component\Security\Core\User\UserInterface;

class TaskController extends AbstractController
{
    /**
     * @Route("/tasks", name="task")
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
     * @Route("/task/detail/{id}", name="task.detail")
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

    /**
     * @Route("/task/create", name="task.create")
     */
    public function create(Request $request, UserInterface $user)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $task->setCreatedAt(new \Datetime('now'));
            $task->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('task.detail', ['id' => $task->getId()])
            );
        }

        return $this->render('task/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/mis-tareas", name="task.my-tasks")
     */
    public function myTasks(UserInterface $user)
    {
        $tasks = $user->getTasks();

        return $this->render('task/my-tasks.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @Route("/task/edit/{id}", name="task.edit")
     */
    public function edit(Request $request, Task $task, UserInterface $user)
    {
        if($user->getId() != $task->getUser()->getId()) {
            return $this->redirectToRoute('task');
        }
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('task.detail', ['id' => $task->getId()])
            );
        }

        return $this->render('task/create.html.twig', [
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/task/delete/{id}", name="task.delete")
     */
    public function delete(Task $task, UserInterface $user)
    {
        if($user->getId() != $task->getUser()->getId()) {
            return $this->redirectToRoute('task');
        }
        if (!$task) {
            return $this->redirectToRoute('task');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();
        return $this->redirectToRoute('task');
    }
}
