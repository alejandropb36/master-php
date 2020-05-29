<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Animal;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Forms\AnimalType;

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

        // QueryBilder
        
        $queryBuilder = $animalRepo->createQueryBuilder('a')
            // ->andWhere("a.raza = :raza")
            // ->setParameter('raza', 'Canino')
            ->orderBy('a.color', 'asc')
            ->getQuery();
        $resultSet = $queryBuilder->execute();

        var_dump($resultSet);

        // DQL
        $entityManager = $this->getDoctrine()->getManager();
        $dql = "SELECT a FROM App\Entity\Animal a WHERE a.raza = 'canino'";
        $query = $entityManager->createQuery($dql);
        $resultSetDQL = $query->execute();

        var_dump($resultSetDQL);

        // SQL
        $connection = $this->getDoctrine()->getConnection();
        $sql = "SELECT * FROM animales ORDER BY id desc";
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        $resultSetSQL = $prepare->fetchAll();

        var_dump($resultSetSQL);

        // Animal Repository
        var_dump('Repository', $animalRepo->getAnimalsOrderColor('asc'));

        // var_dump($animal);
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animals' => $animals
        ]);
    }

    /**
     * @Route("/animal/crear", name="animal.create")
     */
    public function create(Request $request)
    {
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);
            

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();

            // Sesion class
            $session = new Session();
            $session->getFlashBag()->add('message', 'Animal creado correctamente');

            return $this->redirectToRoute('animal.create');
        }
        
        return $this->render('animal/crear-animal.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/animal/save", name="animal.save", methods={"POST"})
     */
    public function save(Request $request)
    {
        var_dump($request->get('form')); exit;
        return new Response('Hola desde animal.save');
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

    /**
     * @Route("/animal/delete/{id}", name="animal.delete")
     */
    public function delete(Animal $animal)
    {
        if(!$animal) {
            return new Response('El animal no existe');
        }
        $doctrine =$this->getDoctrine();

        $entityManager = $doctrine->getManager();
        $entityManager->remove($animal);

        $entityManager->flush();

        var_dump($animal);
        return new Response('El animal se ha borrado correctamente');
    }
}
