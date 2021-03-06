<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class CarAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'         => 1,
        '_sort_by'     => 'model',
        '_sort_order'   => 'ASC',
        'active'        => array(
            'value'         => true
        )
    );

    const OLDEST_YEAR = 1980;
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('active')
            ->add('model')
            //->add('year')
            ->add('pTSNumber')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('commisionContract.date')
            ->add('active')
            ->addIdentifier('model')
            ->add('vIN')
            ->add('year', null, array(
                'template'      => 'SergeiKAvangardBundle:Admin:car_year.html.twig'
            ))
            ->add('color')
            ->add('price')
            ->add('payed')
            ->add('should_pay', null, array(
                'template'      => 'SergeiKAvangardBundle:Admin:car_parking_price.twig.html',
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'print' => array(
                        'template'      => 'SergeiKAvangardBundle:Admin:commision_print_btn.twig.html'
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
        $formMapper
            ->add('model')
            ->add('vIN')
            ->add('type')
            ->add('year', 'date', array(
                'years' => range(CarAdmin::OLDEST_YEAR, date('Y'))
            ))
            ->add('engineNumber')
            ->add('chassisNumber')
            ->add('bodyNumber')
            ->add('color')
            ->add('enginePowerHP')
            ->add('enginePowerKWt')
            ->add('engineVolume')
            ->add('pTSNumber')
            ->add('issuerName')
            ->add('issueDate', 'date', array(
                'years' => range(CarAdmin::OLDEST_YEAR, date('Y'))
            ))
            ->add('regCardNumber')
            ->add('regCardIssueDate', 'date', array(
                'years'         => range(CarAdmin::OLDEST_YEAR, date('Y')),
                'required'      => false
            ))
            ->add('plateNumber')
            ->add('transmission')
            ->add('price')
            ->add('adds')
            ->add('active')
            ->add('payed')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('model')
            ->add('vIN')
            ->add('type')
            ->add('year')
            ->add('engineNumber')
            ->add('chassisNumber')
            ->add('bodyNumber')
            ->add('color')
            ->add('enginePowerHP')
            ->add('enginePowerKWt')
            ->add('engineVolume')
            ->add('pTSNumber')
            ->add('issuerName')
            ->add('issueDate')
        ;
    }

    protected function configureRoutes(RouteCollection $collection){
        $collection->add('print', $this->getRouterIdParameter().'/print');
    }
}
