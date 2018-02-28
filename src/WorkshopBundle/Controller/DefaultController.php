<?php

namespace WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use	Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $name = $request->request->get('name');
        $persons = null;

        if($name) {
            
            $doctrine = $this->getDoctrine();
            
            $persons = $doctrine->getRepository('WorkshopBundle:User')->findByNameOrSurname($name);
         
        }
     
        return $this->render('WorkshopBundle:Default:index.html.twig', ['persons' => $persons]);
    }
}
