<?php

namespace Squazic\HighlineGuideBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SquazicHighlineGuideBundle:Default:index.html.twig', array('name' => $name));
    }
}
