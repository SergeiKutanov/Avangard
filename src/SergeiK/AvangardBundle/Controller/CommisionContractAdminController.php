<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 10/30/13
 * Time: 9:33 PM
 */

namespace SergeiK\AvangardBundle\Controller;


use SergeiK\AvangardBundle\Admin\CommisionContractAdmin;
use Sonata\AdminBundle\Controller\CRUDController;
use SergeiK\AvangardBundle\Entity\CommisionContract;

class CommisionContractAdminController extends CRUDController{
    public function printAction(CommisionContract $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/';
        if($c->getCommisionerAgent() != null){
            $template_path .= 'commision_with_agent.odt';
        }else{
            $template_path .= 'commision.odt';
        }
        $TBS->LoadTemplate($template_path);
        $TBS->MergeField('client', array(
            'id'  => 1
        ));
        $filename = 'commision_contract_' .
            $c->getCar() . '-' .
            $c->getCommisioner();
        $TBS->Show(OPENTBS_DOWNLOAD, $filename);
    }
}