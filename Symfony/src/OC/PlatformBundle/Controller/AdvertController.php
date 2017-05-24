<?php

// src/OC/PlatformBundle/Controller/AdvertController

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

	public function byeAction()
	{
		$content = 
		$this->get('templating')
		     ->render('OCPlatformBundle:Advert:bye.html.twig', array('nom' => 'Abel'));
		
		return new Response($content);
	}
}