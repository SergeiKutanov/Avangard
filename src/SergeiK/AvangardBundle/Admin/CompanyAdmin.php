<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CompanyAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('address')
            ->add('iNN')
            ->add('kPP')
            ->add('bankAccountNumber')
            ->add('corrAcountNumber')
            ->add('bIK')
            ->add('bankName')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('address')
            ->add('iNN')
            ->add('kPP')
            ->add('bankAccountNumber')
            ->add('corrAcountNumber')
            ->add('bIK')
            ->add('bankName')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
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
            ->add('name')
            ->add('address')
            ->add('iNN')
            ->add('kPP')
            ->add('bankAccountNumber')
            ->add('corrAcountNumber')
            ->add('bIK')
            ->add('bankName')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('address')
            ->add('iNN')
            ->add('kPP')
            ->add('bankAccountNumber')
            ->add('corrAcountNumber')
            ->add('bIK')
            ->add('bankName')
        ;
    }
}
