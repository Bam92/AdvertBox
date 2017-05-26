<?php

// src/OC/PlatformBundle/Controller/AdvertController

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AdvertController extends Controller
{
	
	public function indexAction($page)
	{// Notre liste d'annonce en dur

    $listAdverts = array(

      array(

        'title'   => 'Recherche développpeur Symfony',

        'id'      => 1,

        'author'  => 'Alexandre',

        'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',

        'date'    => new \Datetime()),

      array(

        'title'   => 'Mission de webmaster',

        'id'      => 2,

        'author'  => 'Hugo',

        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',

        'date'    => new \Datetime()),

      array(

        'title'   => 'Offre de stage webdesigner',

        'id'      => 3,

        'author'  => 'Mathieu',

        'content' => 'Nous proposons un poste pour webdesigner. Blabla…',

        'date'    => new \Datetime())

    );


    // Et modifiez le 2nd argument pour injecter notre liste

    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(

      'listAdverts' => $listAdverts

    ));
		
	}

	public function viewAction($id)
	{
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
			'id'  => $id));
	}


    public function addAction(Request $request)

    {

        if ($request->isMethod('POST')) { // the form is sent
        	$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistree');

        	return $this->redirectToRoute('oc_platform_view', array('id' => 5 ));
        }

        return $this->render('OCPlatformBundle:Advert:add.html.twig');

    }

    public function editAction($id, Request $request)
    {
        if ($request->isMethod('POST')) { // the form is sent
        	$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiee');

        	return $this->redirectToRoute('oc_platform_view', array('id' => 5 ));
        }
        
        return $this->render('OCPlatformBundle:Advert:edit.html.twig');
    }

    public function deleteAction($id)
    {        
        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }

    public function menuAction()
    {
      // On fixe en dur une liste ici, bien entendu par la suite
     // on la récupérera depuis la BDD !
     $listAdverts = array(
        array('id' => 2, 'title' => 'Recherche développeur Symfony'),
        array('id' => 5, 'title' => 'Mission de webmaster'),
        array('id' => 9, 'title' => 'Offre de stage webdesigner')
      );

     return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(

      // Tout l'intérêt est ici : le contrôleur passe
      // les variables nécessaires au template !
      'listAdverts' => $listAdverts
    ));

  }
}