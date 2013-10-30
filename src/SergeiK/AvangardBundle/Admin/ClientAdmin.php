<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClientAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('ppassportSeriea')
            ->add('passportNumber')
            ->add('passportIssuer')
            ->add('passportIssueDate')
            ->add('address')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('ppassportSeriea')
            ->add('passportNumber')
            ->add('passportIssuer')
            ->add('passportIssueDate')
            ->add('address')
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
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('ppassportSeriea')
            ->add('passportNumber')
            ->add('passportIssuer')
            ->add('passportIssueDate')
            ->add('address')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('ppassportSeriea')
            ->add('passportNumber')
            ->add('passportIssuer')
            ->add('passportIssueDate')
            ->add('address')
        ;
    }
}
