<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Quizz;
use App\Form\RegistrationFormType;
use App\Form\RolesFormType;
use App\Form\UpdateUserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user", name="admin_user_")
 * @package App\Controller\Admin
 */
class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        return $this->render('Admin/user/index.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajoutUser(Request $request)
    {
        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('UserAjouter', 'User ajouté avec succès');
            return $this->redirectToRoute('admin_user_home');
        }

        return $this->render('admin/user/ajout.html.twig', [
            'registrationForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(User $user,int $id)
    {
        if ($this->entityManager->getRepository(User::class)->find($id)){

            $this->entityManager->remove($user);
            $this->entityManager->flush();

            $this->addFlash('UserSupprimer', 'User supprimé avec succès');
        }
        else{
            $this->addFlash('UserNotSupprimer', 'Vous ne pouvez pas supprimé ce user il est lié à des dramas');
        }
        return $this->redirectToRoute('admin_user_home');
    }

}
