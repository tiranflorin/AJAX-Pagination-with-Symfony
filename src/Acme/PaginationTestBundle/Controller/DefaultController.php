<?php

namespace Acme\PaginationTestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $em    = $this->get('doctrine.orm.entity_manager');
            $dql   = "SELECT a FROM AcmePaginationTestBundle:Article a";
            $query = $em->createQuery($dql);

            $page = $this->get('request')->get('pageId');
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                //$this->get('request')->query->get('page', 1)/*page number*/,
                $page,
                2/*limit per page*/
            );
            //set a custom paginator template
            $pagination->setTemplate('AcmePaginationTestBundle:MyPaginationTemplate:custom_pagination.html.twig');


            // parameters to template
            return new Response($this->renderView('AcmePaginationTestBundle:Default:list.html.twig', array('pagination' => $pagination)));
        } else {
            return $this->render('AcmePaginationTestBundle:Default:index.html.twig');
        }
    }

    public function listAction(){
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AcmePaginationTestBundle:Article a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            2/*limit per page*/
        );
        // parameters to template
        return $this->render('AcmePaginationTestBundle:Default:list.html.twig', array('pagination' => $pagination));
    }

    public function paginateAction(){
        if ($this->getRequest()->isXmlHttpRequest()) {
            $em    = $this->get('doctrine.orm.entity_manager');
            $dql   = "SELECT a FROM AcmePaginationTestBundle:Article a";
            $query = $em->createQuery($dql);

            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $this->get('request')->query->get('page', 1)/*page number*/,
                2/*limit per page*/
            );

            // parameters to template
            return $this->renderView('AcmePaginationTestBundle:Default:list.html.twig', array('pagination' => $pagination));
        }
    }
}
