<?php

namespace WorkshopBundle\Controller;

use WorkshopBundle\Entity\Email;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Email controller.
 *
 * @Route("email")
 */
class EmailController extends Controller
{
    /**
     * Lists all email entities.
     *
     * @Route("/", name="email_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emails = $em->getRepository('WorkshopBundle:Email')->findAll();

        return $this->render('email/index.html.twig', array(
            'emails' => $emails,
        ));
    }

    /**
     * Creates a new email entity.
     *
     * @Route("/new", name="email_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $email = new Email();
        $form = $this->createForm('WorkshopBundle\Form\EmailType', $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();

            return $this->redirectToRoute('email_show', array('id' => $email->getId()));
        }

        return $this->render('email/new.html.twig', array(
            'email' => $email,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a email entity.
     *
     * @Route("/{id}", name="email_show")
     * @Method("GET")
     */
    public function showAction(Email $email)
    {
        $deleteForm = $this->createDeleteForm($email);

        return $this->render('email/show.html.twig', array(
            'email' => $email,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing email entity.
     *
     * @Route("/{id}/modify", name="email_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Email $email)
    {
        $deleteForm = $this->createDeleteForm($email);
        $editForm = $this->createForm('WorkshopBundle\Form\EmailType', $email);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('email_edit', array('id' => $email->getId()));
        }

        return $this->render('email/edit.html.twig', array(
            'email' => $email,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/addEmail/", name = "add_email")
     * @Method("POST")
     */
    public function addEmailAction(Request $request, $id) {
        $newEmail = new Email();
        
        $emailForm = $this->createFormBuilder($newEmail)
                        ->add('emailAddress', TextType::class)
                        ->add('emailType', TextType::class)
                        ->add('save', SubmitType::class)
                        ->getForm();
        
        $emailForm->handleRequest($request);
        
        if($emailForm->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            
            $userRepository = $manager->getRepository('WorkshopBundle:User');
            $user = $userRepository->findOneById($id);
           
            $newEmail = $emailForm->getData();
            $newEmail->setUser($user);

            $user->addEmail($newEmail);
            
            $manager->persist($newEmail);
            $manager->persist($user);
            $manager->flush();
            
            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }
    }
    
    /**
     * Deletes a email entity.
     *
     * @Route("/{id}", name="email_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Email $email)
    {
        $form = $this->createDeleteForm($email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($email);
            $em->flush();
        }

        return $this->redirectToRoute('email_index');
    }

    /**
     * Creates a form to delete a email entity.
     *
     * @param Email $email The email entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Email $email)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('email_delete', array('id' => $email->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
