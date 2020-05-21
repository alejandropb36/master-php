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
            'hello' => 'Hola mundo desde symfony 5'
        ]);
    }

    /**
     * @Route(
     *      "/animales/{nombre?}/{apellidos}",
     *      name="animales",
     *      defaults={"nombre":"Alejandro", "apellidos": "Ponce"},
     *      methods={"GET"},
     *      requirements={"nombre"="[a-zA-Z ]+"}
     * ) 
     */  
    public function animales($nombre, $apellidos) {
        $title = 'Pagina de animales';


        return $this->render('home/animales.html.twig', [
            'title' => $title,
            'nombre' => $nombre,
            'apellidos' => $apellidos
        ]);
    }


    
    public function salir() {
        // return $this->redirectToRoute('animales', [
        //     'nombre' => 'Luis Alejandro',
        //     'apellidos' => 'Ponce Brizuela'
        // ]);

        return $this->redirect('https://elantiguosabor.com');
    }

}
