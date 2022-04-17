<?php

namespace App\Controller;

use App\Form\ContactType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
Use App\Entity\Contact;

class ContactController extends AbstractController
{
    #[Route('/apropos', name: 'apropos')]
    public function index(Request $request, MailerInterface $mailer,EntityManagerInterface $entityManager)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($contact);
            $entityManager->flush();

            $message = (new TemplatedEmail())
                ->from($form->get('ctMail')->getData())
                ->to('noreply.dramatik@gmail.com')
                ->subject('Vous avez reçu un mail concernant le site')
                ->text('Celui qui vous envoyez la demande: '.$form->get('ctMail')->getData().\PHP_EOL.
                    $form->get('ctMessage')->getData(),
                    'text/plain');
            $mailer->send($message);

            $this->addFlash('success', 'Votre message a été envoyé!');

            return $this->redirectToRoute('apropos');
        }

        return $this->render('apropos.html.twig', [
            'contact_form' => $form->createView()
        ]);
    }
}
