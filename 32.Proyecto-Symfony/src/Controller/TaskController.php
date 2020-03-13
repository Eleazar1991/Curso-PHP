<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Form\TaskType;

use Symfony\Component\Security\Core\User\UserInterface;

class TaskController extends AbstractController
{

    public function index()
    {
        //Prueba de entidades y relaciones
        $em=$this->getDoctrine()->getManager();
        $task_repo=$this->getDoctrine()->getRepository(Task::class);
        $tasks=$task_repo->findBy([],['id'=>'DESC']);

        // foreach($tasks as $task){
           
        //     echo $task->getUser()->getEmail().' ~ '.$task->getTitle()."<br/>";
        // }
        // $user_repo=$this->getDoctrine()->getRepository(User::class);
        // $users = $user_repo->findAll();
        // foreach($users as $user){
           
        //     echo "<h1>{$user->getName()} {$user->getSurname()}</h1>";
        //     foreach($user->getTasks() as $task){
            
        //         echo $task->getTitle()."<br/>";
        //     }
        // }

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    public function detail(Task $task){
        if(!$task){
            return $this->redirectToRoute('tasks');
        }else{
            return $this->render('task/detail.html.twig',[
                'task'=>$task
            ]);
        }
    }

    public function creation(Request $request, UserInterface $user){
        $task=new Task();
        //Crear formulario
        $form=$this->createForm(TaskType::class, $task);

        //Obtener los datos del formulario
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // //Introducimos los datos que faltan
            // $user->setRole('ROLE_USER');
            // //Introducimos la contraseña cifrada -> Fichero /config/packages/security.yaml
            // $encoded=$encoder->encodePassword($user, $user->getPassword());
            // $user->setPassword($encoded);
            //Fecha actual
            $date_now = (new \DateTime('now'));
            $task->setCreatedAt($date_now);
            //Usuario
            $task->setUser($user);

            //Guardar Tarea
            $em=$this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('task_detail',['id'=> $task->getId()]);
        }

        return $this->render('task/creation.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function myTasks(Request $request, UserInterface $user){
        $tasks=$user->getTasks();

        return $this->render('task/my-tasks.html.twig',[
            'tasks'=>$tasks
        ]);
    }

    public function edit(Request $request, UserInterface $user, Task $task){

        if(!$user || $user->getId() != $task->getUser()->getId()){
            return $this->redirectToRoute('tasks');
        }
        //Crear formulario
        $form=$this->createForm(TaskType::class, $task);

        //Obtener los datos del formulario
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Editar Tarea
            $em=$this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('task_detail',['id'=> $task->getId()]);
        }

        return $this->render('task/creation.html.twig',[
            'edit' => true, 
            'form'=> $form->createView()
        ]);
    }

    public function delete(Task $task,UserInterface $user){
        if(!$task || !$user || $user->getId() != $task->getUser()->getId()){
            return $this->redirectToRoute('tasks');
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();
        return $this->redirectToRoute('tasks');
    }
}
