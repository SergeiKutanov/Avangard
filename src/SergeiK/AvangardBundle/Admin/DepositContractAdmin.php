<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\DateTime;
use Sonata\AdminBundle\Route\RouteCollection;

class DepositContractAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('buyer')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('date')
            ->add('amount')
            ->add('carPrice')
            ->add('deadline')
            ->add('buyer')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    'print' => array(
                        'template'  => 'SergeiKAvangardBundle:Admin:commision_print_btn.twig.html'
                    )
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $date = new \DateTime();
        $depContract = $this->getSubject();
        if($depContract->getDate() != null){
            $date = $depContract->getDate();
        }
        $interval = new \DateInterval("P10D");
        $end_date = clone $date;
        $end_date->add($interval);
        
        $formMapper
            ->add('date', null, array(
                'data'  => $date
            ))
            ->add('commisionContract', 'sonata_type_model', array(
                'required'      => true,
                'empty_value'   => 'Choose a commision contract'
            ))
            ->add('buyer')
            ->add('amount')
            ->add('carPrice')
            ->add('deadline', null, array(
                'data'  => $end_date
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('date')
            ->add('amount')
            ->add('carPrice')
            ->add('deadline')
        ;
    }

    protected function configureRoutes(RouteCollection $collection){
        $collection->add('print', $this->getRouterIdParameter().'/print');
    }
}
