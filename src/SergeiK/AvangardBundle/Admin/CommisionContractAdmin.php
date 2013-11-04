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
        $car_l = $this->getModelManager()->createQuery(
            'SergeiK\AvangardBundle\Entity\Car',
            'c'
        );
        $car_l->select('c')
            ->where('c.active = :act')
            ->setParameter('act', true);

        $formMapper
            ->add('date', null, array(
                'data'  => new \DateTime()
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
            ->add('car', null, array(
                'required'  => true,
                'choices'     => $car_l->execute()
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
