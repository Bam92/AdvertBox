<?php

// src/OC/PlatformBundle/Controller/AdvertController

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
* 
*/
class AdvertController extends Controller
{
	
	public function indexAction()
	{
		$content = 
		$this->get('templating')
		     ->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Abel'));
		
		return new Response($content);
	}

	public function viewAction($id, Request $request)
	{
		$tag = $request->query->get('tag');
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
			'id'  => $id,
			'tag' => $tag,
		));
			//"Affichage de l'annonce d'id : " .$id. ", avec le tag : " .$tag);
	}

	 // On récupère tous les paramètres en arguments de la méthode

    public function viewSlugAction($slug, $year, $_format)

    {

        return new Response(
        	"On pourrait afficher l'annonce correspondant au 
        	slug ': ".$slug."', créée en ".$year." et au format ".$_format.".");

    }
}