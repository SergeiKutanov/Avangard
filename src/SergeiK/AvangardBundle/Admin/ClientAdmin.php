<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\DateTime;

class ClientAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'         => 1,
        '_sort_order'   => 'ASC',
        '_sort_by'      => 'lastName'
    );

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastName')
            ->add('firstName')
            ->add('middleName')
            ->add('passportSeries')
            ->add('passportNumber')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('lastName')
            ->add('firstName')
            ->add('middleName')
            ->add('_action', 'actions', array(
                'actions' => array(
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
            ->add('passportSeries')
            ->add('passportNumber')
            ->add('passportIssuer')
            ->add('passportIssueDate', 'date', array(
                'years' => range(1980, date('Y'))
            ))
            ->add('address')
            ->add('phone')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('lastName')
            ->add('ppassportSeriea')
            ->add('passportNumber')
        ;
    }
}
