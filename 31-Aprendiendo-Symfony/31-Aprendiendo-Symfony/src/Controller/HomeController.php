<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'valor'=>'Hola mundo con Symfony 4',
        ]);
    }
    // public function animales()
    // {
    //     $title='Bienvenido a la página de animales';
    //     return $this->render('home/animales.html.twig',[
    //         'title'=>$title,
    //         'nombre'=>$nombre
    //     ]);
    // }
    // public function animales($nombre)
    // {
    //     $title='Bienvenido a la página de animales';
    //     return $this->render('home/animales.html.twig',[
    //         'title'=>$title,
    //         'nombre'=>$nombre
    //     ]);
    // }

    public function animales($nombre,$apellidos)
    {
        $title='Bienvenido a la página de animales';
        return $this->render('home/animales.html.twig',[
            'title'=>$title,
            'nombre'=>$nombre,
            'apellidos'=>$apellidos
        ]);
    }
    public function redirigir()
    {
        //Redireccion
        // return $this->redirectToRoute('index');
        
        // Redireccion con código
        // return $this->redirectToRoute('index',array(),301);

        //Redirección con parámetros
        // return $this->redirectToRoute('animales',[
        //     'nombre' => 'Juan Pedro',
        //     'apellidos' => 'Lopez'
        // ]);

        //Redireccion a URL
            return $this->redirect('https://google.es');
    }
}
