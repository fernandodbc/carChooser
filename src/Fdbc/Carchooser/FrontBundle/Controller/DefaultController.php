<?php

namespace Fdbc\Carchooser\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FdbcCarchooserFrontBundle:Default:index.html.twig');
    }
}
