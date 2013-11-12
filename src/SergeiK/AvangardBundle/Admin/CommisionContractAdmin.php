<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class CommisionContractAdmin extends Admin
{

    protected $datagridValues = array(
        'car.active'    => array(
            'value'         => 1
        ),
        'page'          => 1,
        '_sort_by'      => 'date',
        '_sort_order'   => 'DESC'
    );
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('date')
            ->add('car.active')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('car.active')
            ->add('date')
            ->add('car')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    'print' => array(
                        'template'  => 'SergeiKAvangardBundle:Admin:commision_print_btn.twig.html'
                    ),
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
        $comContract = $this->getSubject();
        if($comContract->getDate() != null){
            $date = $comContract->getDate();
        }

        $car_l = $this->getModelManager()->createQuery(
            'SergeiK\AvangardBundle\Entity\Car',
            'c'
        );
        if(!$this->getSubject()->getCar()){
            $car_l->select('c')
                ->where('c.active = :act')
                ->setParameter('act', true);
        }

        $formMapper
            ->add('date', null, array(
                'data'  => $date
            ))
            ->add('commisioner', null, array(
                'required'  => true
            ))
            ->add('commisionerAgent', null, array(
                'required'  => false
            ))
            ->add('warrantNumber')
            ->add('warrantDate')
            ->add('warrantIssuer')
            ->add('warrantRegNum')
            ->add('car', 'sonata_type_model', array(
                'required'  => true,
                'query'     => $car_l,
                'empty_value'    => 'Choose a car'
                ))
            ->add('minPrice')
            ->add('minPriceEmpty')
            ->add('reward')
            ->add('rewardEmpty')
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
            ->add('minPrice')
            ->add('reward')
        ;
    }

    protected function configureRoutes(RouteCollection $collection){
        $collection->add('print', $this->getRouterIdParameter().'/print');
    }

}
