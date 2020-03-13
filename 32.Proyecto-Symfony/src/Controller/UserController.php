<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\RegisterType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use App\Form\LoginType;

class UserController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user=new User();
        //Crear formulario
        $form=$this->createForm(RegisterType::class, $user);

        //Obtener los datos del formulario
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //Introducimos los datos que faltan
            $user->setRole('ROLE_USER');
            //Introducimos la contraseña cifrada -> Fichero /config/packages/security.yaml
            $encoded=$encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            //Fecha actual
            $date_now = (new \DateTime('now'));
            $user->setCreatedAt($date_now);

            //Guardar Usuario
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('tasks');
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function login(AuthenticationUtils $authentication_utils){
        $error=$authentication_utils->getLastAuthenticationError();

        $lastUsername=$authentication_utils->getLastUsername();

        return $this->render('user/login.html.twig',array(
            'error' => $error,
            'last_username' => $lastUsername
        ));
    }
}
