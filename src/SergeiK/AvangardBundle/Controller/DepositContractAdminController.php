<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 10/30/13
 * Time: 9:33 PM
 */

namespace SergeiK\AvangardBundle\Controller;


use SergeiK\AvangardBundle\Admin\CommisionContractAdmin;
use SergeiK\AvangardBundle\Entity\DepositContract;
use SergeiK\AvangardBundle\Entity\SaleContract;
use Sonata\AdminBundle\Controller\CRUDController;
use SergeiK\AvangardBundle\Entity\CommisionContract;

class DepositContractAdminController extends CRUDController {
    public function printAction(DepositContract $c){
        $TBS = $this->container->get('opentbs');
        $template_path = $this->get('kernel')->getRootDir().'/../web/doc_templates/deposit_contract.odt';

        $TBS->LoadTemplate($template_path, OPENTBS_ALREADY_UTF8);

        $company = $this->getDoctrine()->getRepository("SergeiKAvangardBundle:Company")->find(1);
        if(!$company){
            die('Set company first');
        }

        $data = array(
            'id'            => $c->getId(),
            'date'          => date('d.m.Y', $c->getDate()->getTimestamp()),
            'full_name'     => $c->getBuyer(),
            'address'       => $c->getBuyer()->getAddress(),
            'passport_n'    => $c->getBuyer()->getPassportSeries() . ' ' . $c->getBuyer()->getPassportNumber(),
            'passport_i'    => $c->getBuyer()->getPassportIssuer(),
            'passport_d'    => date('d.m.Y', $c->getBuyer()->getPassportIssueDate()->getTimestamp()),
            'deposit_n'     => $c->getAmount(),
            'deposit_n_w'   => $this->num_propis($c->getAmount()),
            'car_model'     => $c->getCommisionContract()->getCar()->getModel(),
            'car_vin'       => $c->getCommisionContract()->getCar()->getVIN(),
            'car_type'      => $c->getCommisionContract()->getCar()->getType(),
            'car_year'      => date('Y', $c->getCommisionContract()->getCar()->getYear()->getTimestamp()),
            'car_eng'       => $c->getCommisionContract()->getCar()->getEngineNumber(),
            'car_ch'        => $c->getCommisionContract()->getCar()->getChassisNumber(),
            'car_body'      => $c->getCommisionContract()->getCar()->getBodyNumber(),
            'car_col'       => $c->getCommisionContract()->getCar()->getColor(),
            'car_hp'        => $c->getCommisionContract()->getCar()->getEnginePowerHP(),
            'car_cm'        => $c->getCommisionContract()->getCar()->getEngineVolume(),
            'car_pts'       => $c->getCommisionContract()->getCar()->getPTSNumber(),
            'car_pts_i'     => $c->getCommisionContract()->getCar()->getIssuerName(),
            'car_pts_d'     => date('d.m.Y', $c->getCommisionContract()->getCar()->getIssueDate()->getTimestamp()),
            'com_id'        => $c->getCommisionContract()->getId(),
            'com_d'         => date('d.m.Y', $c->getCommisionContract()->getDate()->getTimestamp()),
            'car_p_n'       => $c->getCarPrice(),
            'car_p_n_w'     => $this->num_propis($c->getCarPrice()),
            'dl'            => date('d.m.Y', $c->getDeadline()->getTimestamp()),
            'deposit_n_d'   => $c->getAmount()*2,
            'deposit_n_d_w' => $this->num_propis($c->getAmount()*2),
            'company_name'              => $company->getName(),
            'company_address'           => $company->getAddress(),
            'company_inn'               => $company->getINN(),
            'company_kpp'               => $company->getKPP(),
            'company_acc_n'             => $company->getBankAccountNumber(),
            'company_corr_acc_n'        => $company->getCorrAcountNumber(),
            'company_bik'               => $company->getBIK(),
            'company_bank_name'         => $company->getBankName(),
            'br_name'            => $c->getBuyer()->getBriefName(),
            'phone'         => $c->getBuyer()->getPhone(),
        );

        $TBS->MergeField('client', $data);
        $filename = 'deposit_contract_' .
            $c->getCommisionContract()->getCar() . '-' .
            $c->getBuyer();
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