<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Animal;

//Formulario
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//Sesiones flash
use Symfony\Component\HttpFoundation\Session\Session;

//Clase Formulario
use App\Form\AnimalType;

//Validar datos aislados
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class AnimalController extends AbstractController
{
    /**
     * @Route("/animal", name="animal")
     */
    public function validarRaza($raza){
        $validator= Validation::createValidator();
        $errores=$validator->validate($raza,[
            new NotBlank(),
            new Regex([
                'pattern' => '/\d/',
                'match' => false,
                'message' => 'La raza no puede contener numeros',
            ])
        ]);

        if(count($errores) != 0){
            echo "La raza no se ha validado </br>";
            foreach($errores as $error){
                echo $error->getMessage()."</br>";
            }
        }else{
            echo "La raza se ha validado correctamente";
        }
        die();
    }

    public function createFormAnimal(Request $request)
    {
        $animal= new Animal();
        $formClass=$this->createForm(AnimalType::class,$animal);
        $form=$this->createFormBuilder($animal)
                   //->setAction($this->generateUrl('animal_save'))
                   ->setMethod('POST')
                        ->add('tipo',TextType::class, [
                            'label' => 'Tipo de Animal',
                        ])
                        ->add('color',TextType::class)
                        ->add('raza',TextType::class)
                        ->add('tipo_pelo',TextType::class)
                        ->add('submit',SubmitType::class, [
                            'label' => 'Crear Animal',
                            'attr' => [ 'class' => 'btn']
                        ])
                    ->getForm();
        
        $form->handleRequest($request);
        $formClass->handleRequest($request);
        if(($form->isSubmitted() && $form->isValid()) || (($formClass->isSubmitted() && $formClass->isValid()))){
            var_dump($animal);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($animal);
            $entityManager->flush();

            //Sesión Flash
            $session = new Session();
            $session->getFlashBag()->add('message','Animal Creado');

            //Redireccion a la misma página
            return $this->redirectToRoute('create-animal');
        }

        return $this->render('animal/crear-animal.html.twig',[
            'form'=>$form->createView(),
            'formClass'=>$formClass->createView()
        ]);                
    }

    public function index()
    {
        //Cargar repositorio
        $animal_repo=$this->getDoctrine()->getRepository(Animal::class);

        //Consulta
        $animales=$animal_repo->findAll();
        
        $animal=$animal_repo->findOneBy([
            'tipo' => 'Avestruz'
        ]);

        $animalaves=$animal_repo->findBy([
            'tipo' => 'Avestruz'
        ]);

        var_dump($animal);
        var_dump($animalaves);

        //Query Builder
        $queryBuilder=$animal_repo->createQueryBuilder('a')
        ->andWhere('a.raza=:raza')
        ->setParameter('raza','Africana')
        ->orderBy('a.id','DESC')
        ->getQuery();
        //Ejecucion de la consulta
        $resultset=$queryBuilder->execute();
        var_dump($resultset);

        //DQL
        $dql="SELECT a FROM App\Entity\Animal a WHERE a.raza='Africana'";
        $query=$this->getDoctrine()->getManager()->createQuery($dql);
        $resultset=$query->execute();
        var_dump($resultset);
        //SQL
        $conecction=$this->getDoctrine()->getConnection();
        $sql="SELECT * FROM animales ORDER BY id='DESC'";
        $prepare=$conecction->prepare($sql);
        $prepare->execute();
        $resultset=$prepare->fetchAll();
        var_dump($resultset);

        //Repositorio
        $animals=$animal_repo->findByRaza('Africana');
        var_dump($animals);
        $animals=$animal_repo->animalsByRaza('Africana');
        var_dump($animals);

        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animales'=>$animales
        ]);


    }
    public function save(Request $request)
    {
       var_dump($request->get('form'));
       die();
        // //Guardar en una tabla de la bd
        // //Cargo Entity Manager
        // $entityManager= $this->getDoctrine()->getManager();

        // //Creo el objeto y le doy valores
        // $animal=new Animal();
        // $animal->setTipo('Avestruz');
        // $animal->setColor('Verde');
        // $animal->setRaza('Africana');
        // $animal->setTipoPelo('Avestruz');

        // //Guardar objeto en Doctrine
        // $entityManager->persist($animal);

        // //Volcar datos en la tabla / guardar en la bd
        // $entityManager->flush();


        // echo "<h1>Hola Mundo soy el animal ".$animal->getTipo()."</h1>";
        // die();
    }
    // public function animal($id){
    //      //Cargar repositorio
    //      $animal_repo=$this->getDoctrine()->getRepository(Animal::class);

    //      //Consulta
    //      $animal=$animal_repo->find($id);
    public function animal(Animal $animal){    
        //Comprobar si el resultado es correcto
        if(!$animal){
            $message="El animal no existe";
        }else{
            $message="Tu animal elegido es ".$animal->getTipo()."-".$animal->getRaza()."";
        }

        return new Response($message);
    }

    public function update($id){
        //Cargar doctrine
            $doctrine=$this->getDoctrine();
        //Cargar entityManager
            $entityManager = $doctrine->getManager();
        //Cargar el repo de la entidad Animal
            $animal_repo =  $entityManager->getRepository(Animal::class);
        //Find para sacar el objeto
            $animal = $animal_repo->find($id);
        //Comprobar si el objeto me llega
            if(!$animal){
                $message="Animal no existe en la BBDD";
            }else{
                //Asignarle los valores al objeto
                    $animal->setTipo("Perro");
                    $animal->setColor("rojo");
                //Persistir en doctrine el objeto
                    $entityManager->persist($animal);
                //Guardar en la BD
                    $entityManager->flush();
                //Respuesta
                    $message="Has actualizado el animal ".$animal->getId();
            }
            return new Response($message);

    }
    public function delete(Animal $animal){
        //Cargar EntityManager
        $entityManager = $this->getDoctrine()->getManager();
        //Borrar de Doctrine
        $entityManager->remove($animal);
        //Borrar de la BD
        $entityManager->flush();
        if($animal){
            $message="Borrado correctamente!";
        }else{
            $message="No se ha borrado";
        } 
        return new Response($message);
    }
}
