<?php

namespace SergeiK\AvangardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/test")
     * @Template()
     */
    public function testAction(){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/commision.odt';
        $TBS->LoadTemplate($template_path);
        $TBS->MergeField('client', array(
            'id'  => 1
        ));
        $TBS->Show(OPENTBS_DOWNLOAD, 'filename.odt');
        die('test');
    }
}
