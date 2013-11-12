<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class SaleContractAdmin extends Admin
{
    protected $datagridValues = array(
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
            ->add('price')
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
            ->add('commisionContract')
            ->add('price')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    'print' => array(
                        'template'  => 'SergeiKAvangardBundle:Admin:sale_print_btn.twig.html'
                    ),
                    'print_hand_sale'   => array(
                        'template'  => 'SergeiKAvangardBundle:Admin:sale_hand_print_btn.html.twig'
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
        $saleContract = $this->getSubject();
        if($saleContract->getDate() != null){
            $date = $saleContract->getDate();
        }
        $com_list = $this->getModelManager()->createQuery(
            'SergeiK\AvangardBundle\Entity\CommisionContract',
            'c'
        );

        $com_list->select('c')
            ->leftJoin('c.car', 'car')
            ->where('car.active = :act')
            ->setParameter('act', true);

        $formMapper
            ->add('date', null, array(
                'data'  => $date
            ))
            ->add('commisionContract', 'sonata_type_model', array(
                'required'      => true,
                'query'         => $com_list,
                'empty_value'   => 'Choose a commision contract'
            ))
            ->add('buyer')
            ->add('price')
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
            ->add('price')
        ;
    }

    protected function configureRoutes(RouteCollection $collection){
        $collection->add('print', $this->getRouterIdParameter().'/print');
        $collection->add('print_org_doc', 'print_org_doc');
        $collection->add('print_hand_sale', $this->getRouterIdParameter().'/print_hand_sale');
    }
}
