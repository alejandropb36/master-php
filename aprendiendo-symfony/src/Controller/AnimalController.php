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
        // Caragr el repositorio
        $animalRepo =$this->getDoctrine()->getRepository(Animal::class);

        // Consulta
        $animals = $animalRepo->findAll();

        $animal = $animalRepo->findOneBy([
            'tipo' => 'Ave'
        ]);

        var_dump($animal);
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animals' => $animals
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

    /**
     * @Route("/animal/{id}", name="animal.find")
     */
    public function animal($id)
    {
        // Caragr el repositorio
        $animalRepo =$this->getDoctrine()->getRepository(Animal::class);

        // Consulta
        $animal = $animalRepo->find($id);

        // Comprobar existencia
        if(!$animal) {
            $message = 'El animal no existe';
            return new Response($message);
        }

        return new Response('El animal elegido es de tipo ' . $animal->getTipo() . '  de la raza ' . $animal->getRaza());
    }


    /**
     * @Route("/animal/update/{id}", name="animal.update")
     */
    public function update($id)
    {
        $doctrine =$this->getDoctrine();

        $entityManager = $doctrine->getManager();

        $animalRepo = $entityManager->getRepository(Animal::class);

        $animal = $animalRepo->find($id);

        if(!$animal) {
            return new Response('No existe el animal');
        }

        $animal->setTipo('Caninoi');
        $animal->setColor('Rojo');

        $entityManager->persist($animal);
        $entityManager->flush();

        return new Response(json_encode($animal));
    }
}
