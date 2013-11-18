<?php

namespace SergeiK\AvangardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Component\Validator\Constraints\DateTime;

class ClientAdmin extends Admin
{
    protected $datagridValues = array(
        '_page'         => 1,
        '_sort_order'   => 'ASC',
        '_sort_by'      => 'lastName'
    );

    public function configure(){
        $this->setTemplate('edit', 'SergeiKAvangardBundle:Admin:client_admin.html.twig');
    }

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
            ->add('clientType', 'choice', array(
                'choices' => ClientAdmin::getSubject()->getClientTypesArray()
            ))
            ->add('firstName', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('middleName', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('lastName', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('passportSeries', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('passportNumber', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('passportIssuer', null, array(
                'attr'      => array(
                    'class'     => 'pers'
                )
            ))
            ->add('passportIssueDate', 'date', array(
                'years' => range(1980, date('Y')),
                'attr'  => array(
                    'class'     => 'pers'
                )
            ))
            ->add('companyName', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
            ))
            ->add('inn', null, array(
                'attr'  => array(
                    'class'     => 'comp'
                )
            ))
            ->add('kpp', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
            ))
            ->add('accNumber', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
            ))
            ->add('cor_number', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
            ))
            ->add('bik', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
            ))
            ->add('bankName', null, array(
                'attr'      => array(
                    'class'     => 'comp'
                )
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
