<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 10/30/13
 * Time: 9:33 PM
 */

namespace SergeiK\AvangardBundle\Controller;


use SergeiK\AvangardBundle\Admin\CommisionContractAdmin;
use SergeiK\AvangardBundle\Entity\SaleContract;
use Sonata\AdminBundle\Controller\CRUDController;
use SergeiK\AvangardBundle\Entity\CommisionContract;
use Symfony\Component\HttpFoundation\Response;

class SaleContractAdminController extends CRUDController {

    const EMPTY_LINE = '----------------------------------';

    public function printAction(SaleContract $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/sale_contract.odt';

        $TBS->LoadTemplate($template_path, OPENTBS_ALREADY_UTF8);

        $company = $this->getDoctrine()->getRepository("SergeiKAvangardBundle:Company")->find(1);
        if(!$company){
            die('Set company first');
        }

        $data = array(
            'id'                        => $c->getId(),
            'doc_date'                  => date('d.m.Y',$c->getDate()->getTimestamp()),
            'buyer_full_name'           => $c->getBuyer()->__toString(),
            'comm_id'                   => $c->getCommisionContract()->getId(),
            'comm_date'                 => date('d.m.Y', $c->getCommisionContract()->getDate()->getTimestamp()),
            'comm_full_name'            => $c->getCommisionContract()->getCommisioner()->__toString(),
            'car_model'                 => $c->getCommisionContract()->getCar()->getModel(),
            'car_vin'                   => $c->getCommisionContract()->getCar()->getVIN(),
            'car_body_type'             => $c->getCommisionContract()->getCar()->getType(),
            'car_year'                  => date('Y', $c->getCommisionContract()->getCar()->getYear()->getTimestamp()),
            'car_engine_number'         => $c->getCommisionContract()->getCar()->getEngineNumber(),
            'car_chassis'               => $c->getCommisionContract()->getCar()->getChassisNumber(),
            'car_body_number'           => $c->getCommisionContract()->getCar()->getBodyNumber(),
            'car_color'                 => $c->getCommisionContract()->getCar()->getColor(),
            'car_HP'                    => $c->getCommisionContract()->getCar()->getEnginePowerHP(),
            'car_engine_volume'         => $c->getCommisionContract()->getCar()->getEngineVolume(),
            'car_PTS'                   => $c->getCommisionContract()->getCar()->getPTSNumber(),
            'car_PTS_issuer'            => $c->getCommisionContract()->getCar()->getIssuerName(),
            'car_PTS_issue_date'        => date('d.m.Y', $c->getCommisionContract()->getCar()->getIssueDate()->getTimestamp()),
            'price'                     => $c->getPrice(),
            'price_w'                   => $this->num_propis($c->getPrice()),
            'passport_s'                => $c->getBuyer()->getPassportSeries(),
            'passport_n'                => $c->getBuyer()->getPassportNumber(),
            'passport_i'                => $c->getBuyer()->getPassportIssuer(),
            'passport_i_date'           => date('d.m.Y', $c->getBuyer()->getPassportIssueDate()->getTimestamp()),
            'issuer_address'            => $c->getBuyer()->getAddress(),
            'commisioner_bn'            => $c->getBuyer()->getBriefName(),
            'company_name'              => $company->getName(),
            'company_address'           => $company->getAddress(),
            'company_inn'               => $company->getINN(),
            'company_kpp'               => $company->getKPP(),
            'company_acc_n'             => $company->getBankAccountNumber(),
            'company_corr_acc_n'        => $company->getCorrAcountNumber(),
            'company_bik'               => $company->getBIK(),
            'company_bank_name'         => $company->getBankName(),
        );

        if($c->getCommisionContract()->getCar()->getRegCardNumber() != null &&
            $c->getCommisionContract()->getCar()->getRegCardIssueDate() != null){
            $data['reg_card'] = $c->getCommisionContract()->getCar()->getRegCardNumber() .
                ', ' .
                date('d.m.Y', $c->getCommisionContract()->getCar()->getRegCardIssueDate()->getTimestamp());
        } else{
            $data['reg_card'] = self::EMPTY_LINE;
        }

        if($c->getCommisionContract()->getCar()->getPlateNumber() != null){
            $data['plate'] = $c->getCommisionContract()->getCar()->getPlateNumber();
        }else{
            $data['plate'] = self::EMPTY_LINE;
        }

        $TBS->MergeField('client', $data);
        $filename = 'sale_contract_' .
            $c->getCommisionContract()->getCar() . '-' .
            $c->getBuyer().'.odt';
        $TBS->Show(OPENTBS_DOWNLOAD, $filename);
    }

    public function printHandSaleAction(SaleContract $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/hand_sale.odt';
        $TBS->LoadTemplate($template_path, OPENTBS_ALREADY_UTF8);

        $data = array(
            'date'              => date('d.m.Y', $c->getDate()->getTimestamp()),
            'seller_name'       => $c->getCommisionContract()->getCommisioner(),
            'seller_p_s'        => $c->getCommisionContract()->getCommisioner()->getPassportSeries(),
            'seller_p_n'        => $c->getCommisionContract()->getCommisioner()->getPassportNumber(),
            'seller_p_d'        => date('d.m.Y', $c->getCommisionContract()->getCommisioner()->getPassportIssueDate()->getTimestamp()),
            'seller_p_i'        => $c->getCommisionContract()->getCommisioner()->getPassportIssuer(),
            'seller_address'    => $c->getCommisionContract()->getCommisioner()->getAddress(),
            'buyer_name'        => $c->getBuyer(),
            'buyer_p_s'         => $c->getBuyer()->getPassportSeries(),
            'buyer_p_n'         => $c->getBuyer()->getPassportNumber(),
            'buyer_p_d'         => date('d.m.Y', $c->getBuyer()->getPassportIssueDate()->getTimestamp()),
            'buyer_p_i'         => $c->getBuyer()->getPassportIssuer(),
            'buyer_address'     => $c->getBuyer()->getAddress(),
            'car_vin'           => $c->getCommisionContract()->getCar()->getVIN(),
            'car_body'          => $c->getCommisionContract()->getCar()->getBodyNumber(),
            'car_model'         => $c->getCommisionContract()->getCar()->getModel(),
            'car_chassis'       => $c->getCommisionContract()->getCar()->getChassisNumber(),
            'car_year'          => date('Y', $c->getCommisionContract()->getCar()->getYear()->getTimestamp()),
            'car_pts_n'         => $c->getCommisionContract()->getCar()->getPTSNumber(),
            'car_engine'        => $c->getCommisionContract()->getCar()->getEngineNumber(),
            'car_pts_d'         => date('d.m.Y', $c->getCommisionContract()->getCar()->getIssueDate()->getTimestamp()),
            'car_type'          => $c->getCommisionContract()->getCar()->getType(),
            'car_color'         => $c->getCommisionContract()->getCar()->getColor(),
            'car_pts_i'         => $c->getCommisionContract()->getCar()->getIssuerName(),
            'car_p'             => $c->getPrice(),
            'car_p_h'           => $this->num_propis($c->getPrice())
        );

        if($c->getCommisionContract()->getCar()->getRegCardNumber() != null &&
            $c->getCommisionContract()->getCar()->getRegCardIssueDate() != null){
            $data['car_reg_card'] = $c->getCommisionContract()->getCar()->getRegCardNumber() .
                ', ' .
                date('d.m.Y', $c->getCommisionContract()->getCar()->getRegCardIssueDate()->getTimestamp());
        } else{
            $data['car_reg_card'] = self::EMPTY_LINE;
        }

        if($c->getCommisionContract()->getCar()->getPlateNumber() != null){
            $data['plate'] = $c->getCommisionContract()->getCar()->getPlateNumber();
        }else{
            $data['plate'] = self::EMPTY_LINE;
        }

        $TBS->MergeField('client', $data);
        $filename = 'sale_contract_'.
            $c->getCommisionContract()->getCar() .
            $c->getBuyer() . '.odt';
        $TBS->Show(OPENTBS_DOWNLOAD, $filename);
    }

    public function printOrgDocAction(){
        $path = $this->get('kernel')->getRootDir().'/../web/doc_templates/org_doc.pdf';
        $content = file_get_contents($path);

        $response = new Response();

        $response->headers->set('Content-Type', 'text/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename="org_doc.pdf');

        $response->setContent($content);
        return $response;
    }

    private function num_propis($num){ // $num - цело число

        # Все варианты написания чисел прописью от 0 до 999 скомпануем в один небольшой массив
        $m=array(
            array('ноль'),
            array('-','один','два','три','четыре','пять','шесть','семь','восемь','девять'),
            array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать','пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать'),
            array('-','-','двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят','восемьдесят','девяносто'),
            array('-','сто','двести','триста','четыреста','пятьсот','шестьсот','семьсот','восемьсот','девятьсот'),
            array('-','одна','две')
        );

        # Все варианты написания разрядов прописью скомпануем в один небольшой массив
        $r=array(
            array('...ллион','','а','ов'), // используется для всех неизвестно больших разрядов
            array('тысяч','а','и',''),
            array('миллион','','а','ов'),
            array('миллиард','','а','ов'),
            array('триллион','','а','ов'),
            array('квадриллион','','а','ов'),
            array('квинтиллион','','а','ов')
            // ,array(... список можно продолжить
        );

        if($num==0)return$m[0][0]; # Если число ноль, сразу сообщить об этом и выйти
        $o=array(); # Сюда записываем все получаемые результаты преобразования

        # Разложим исходное число на несколько трехзначных чисел и каждое полученное такое число обработаем отдельно
        foreach(array_reverse(str_split(str_pad($num,ceil(strlen($num)/3)*3,'0',STR_PAD_LEFT),3))as$k=>$p){
            $o[$k]=array();

        # Алгоритм, преобразующий трехзначное число в строку прописью
            foreach($n=str_split($p)as$kk=>$pp)
                if(!$pp)continue;else
                    switch($kk){
                        case 0:$o[$k][]=$m[4][$pp];break;
                        case 1:if($pp==1){$o[$k][]=$m[2][$n[2]];break 2;}else$o[$k][]=$m[3][$pp];break;
                        case 2:if(($k==1)&&($pp<=2))$o[$k][]=$m[5][$pp];else$o[$k][]=$m[1][$pp];break;
                    }$p*=1;if(!$r[$k])$r[$k]=reset($r);

        # Алгоритм, добавляющий разряд, учитывающий окончание руского языка
            if($p&&$k)switch(true){
                case preg_match("/^[1]$|^\\d*[0,2-9][1]$/",$p):$o[$k][]=$r[$k][0].$r[$k][1];break;
                case preg_match("/^[2-4]$|\\d*[0,2-9][2-4]$/",$p):$o[$k][]=$r[$k][0].$r[$k][2];break;
                default:$o[$k][]=$r[$k][0].$r[$k][3];break;
            }$o[$k]=implode(' ',$o[$k]);
        }

        return implode(' ',array_reverse($o));
    }
}