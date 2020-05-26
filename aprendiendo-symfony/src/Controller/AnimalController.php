<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Animal;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animal", name="animal")
     */
    public function index()
    {
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }

    /**
     * @Route("/animal/save", name="animal.save")
     */
    public function save()
    {
        // Guardar en una tabla de la base de datos

        // Cargar manager de doctrine
        $entutyManager = $this->getDoctrine()->getManager();

        // Crear objeto
        $animal = new Animal();

        $animal->setTipo('Ave');
        $animal->setColor('Amarillo');
        $animal->setRaza('Loro');

        // Persistir objetos en la base de datos
        $entutyManager->persist($animal);

        // Volcar los datos en la tabla
        $entutyManager->flush();

        return new Response('El animal se ha guardado con el id: ' . $animal->getId());
    }
}
