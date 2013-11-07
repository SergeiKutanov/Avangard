<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 11/6/13
 * Time: 3:57 PM
 */

namespace SergeiK\AvangardBundle\Block;


use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FUBBlockService extends BaseBlockService{

    public function getName(){
        return 'FOBBlock';
    }

    public function getDefaultSettings(){
        return array();
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'title'     => 'Список автомобилей',
            'template'  => 'SergeiKAvangardBundle:Block:FUB.html.twig'
        ));
    }

    /**
     * @param FormMapper $form
     * @param BlockInterface $block
     *
     * @return void
     */
    public function buildEditForm(FormMapper $form, BlockInterface $block)
    {
        // TODO: Implement buildEditForm() method.
    }

    /**
     * @param ErrorElement $errorElement
     * @param BlockInterface $block
     *
     * @return void
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        // TODO: Implement validateBlock() method.
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null){
        $settings = $blockContext->getSettings();

        return $this->renderResponse(
            $blockContext->getTemplate(),
            array(
                'block' => $blockContext->getBlock(),
            ),
            $response
        );
    }
}