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

class CommisionContractAdminController extends CRUDController {
    public function printAction(CommisionContract $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/';
        if($c->getCommisionerAgent() != null){
            $template_path .= 'commision_with_agent.odt';
        }else{
            $template_path .= 'commision.odt';
        }
        $TBS->LoadTemplate($template_path, OPENTBS_ALREADY_UTF8);

        if($c->getMinPriceEmpty()){
            $minPrice = '_____________(_______________________________________________________________________)';
        }else{
            $minPrice = $c->getMinPrice();
            $minPrice .= ' ( ' . $this->num_propis($c->getMinPrice()) . ')';
        }

        if($c->getRewardEmpty()){
            $reward = '_____________(_______________________________________________________________________)';
        } else {
            $reward = $c->getReward();
            $reward .= ' ( ' . $this->num_propis($c->getReward()) . ')';
        }

        $company = $this->getDoctrine()->getRepository("SergeiKAvangardBundle:Company")->find(1);
        if(!$company){
            die('Set company first');
        }

        $data = array(
            'id'                        => $c->getId(),
            'doc_date'                  => date('d.m.Y',$c->getDate()->getTimestamp()),
            'commisioner_full_name'     => $c->getCommisioner()->__toString(),
            'car_model'                 => $c->getCar()->getModel(),
            'car_vin'                   => $c->getCar()->getVIN(),
            'car_body_type'             => $c->getCar()->getType(),
            'car_year'                  => date('Y', $c->getCar()->getYear()->getTimestamp()),
            'car_engine_number'     => $c->getCar()->getEngineNumber(),
            'car_chassis'               => $c->getCar()->getChassisNumber(),
            'car_body_number'           => $c->getCar()->getBodyNumber(),
            'car_color'                 => $c->getCar()->getColor(),
            'car_HP'                    => $c->getCar()->getEnginePowerHP(),
            'car_kW'                    => $c->getCar()->getEnginePowerKWt(),
            'car_engine_volume'         => $c->getCar()->getEngineVolume(),
            'car_PTS'                   => $c->getCar()->getPTSNumber(),
            'car_PTS_issuer'            => $c->getCar()->getIssuerName(),
            'car_PTS_issue_date'        => date('d.m.Y', $c->getCar()->getIssueDate()->getTimestamp()),
            'min_price'                 => $minPrice,
            'reward'                    => $reward,
            'passport_s'                => $c->getCommisioner()->getPassportSeries(),
            'passport_n'                => $c->getCommisioner()->getPassportNumber(),
            'passport_i'                => $c->getCommisioner()->getPassportIssuer(),
            'passport_i_date'           => date('d.m.Y', $c->getCommisioner()->getPassportIssueDate()->getTimestamp()),
            'issuer_address'            => $c->getCommisioner()->getAddress(),
            'commisioner_bn'            => $c->getCommisioner()->getBriefName(),
            'company_name'              => $company->getName(),
            'company_address'           => $company->getAddress(),
            'company_inn'               => $company->getINN(),
            'company_kpp'               => $company->getKPP(),
            'company_acc_n'             => $company->getBankAccountNumber(),
            'company_corr_acc_n'        => $company->getCorrAcountNumber(),
            'company_bik'               => $company->getBIK(),
            'company_bank_name'         => $company->getBankName(),
        );

        if($c->getCommisionerAgent() != null){
            $data["commisioner_agent_full_name"]    = $c->getCommisionerAgent()->__toString();
            $data['warrant_num']                    = $c->getWarrantNumber();
            $data['warrant_date']                   = date('d.m.Y', $c->getWarrantDate()->getTimestamp());
            $data['warrant_issuer']                 = $c->getWarrantIssuer();
            $data['warrant_reg_num']                = $c->getWarrantRegNum();
        }

        $TBS->MergeField('client', $data);
        $filename = 'commision_contract_' .
            $c->getCar() . '-' .
            $c->getCommisioner();
        $TBS->Show(OPENTBS_DOWNLOAD, $filename);
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