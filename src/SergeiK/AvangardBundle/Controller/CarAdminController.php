<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 10/30/13
 * Time: 9:33 PM
 */

namespace SergeiK\AvangardBundle\Controller;


use SergeiK\AvangardBundle\Admin\CommisionContractAdmin;
use SergeiK\AvangardBundle\Entity\Car;
use SergeiK\AvangardBundle\Entity\SaleContract;
use Sonata\AdminBundle\Controller\CRUDController;
use SergeiK\AvangardBundle\Entity\CommisionContract;

class CarAdminController extends CRUDController {
    public function printAction(Car $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/';
        $template_path .= 'price_tag.odt';

        $TBS->LoadTemplate($template_path, OPENTBS_ALREADY_UTF8);

        $data = array(
            'model'         => $c->getModel(),
            'engine'        => $c->getEngineVolume(),
            'tran'              => $c->getTransmission(),
            'car_hp'            => $c->getEnginePowerHP(),
            'car_year'          => date('Y', $c->getYear()->getTimestamp()),
            'car_adds'          => $c->getAdds(),
            'p'                 => $c->getPrice()
        );

        $TBS->MergeField('client', $data);
        $filename = 'price_tag_' .
            $c->getModel() . '-' .
            date('Y', $c->getYear()->getTimestamp());
        $TBS->Show(OPENTBS_DOWNLOAD, $filename);

    }
}