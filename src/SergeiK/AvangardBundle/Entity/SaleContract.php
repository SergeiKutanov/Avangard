<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaleContract
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SaleContract
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var \SergeiK\AvangardBundle\Entity\Client
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     */
    private $buyer;

    /**
     * @var \SergeiK\AvangardBundle\Entity\CommisionContract
     * @ORM\ManyToOne(targetEntity="CommisionContract")
     * @ORM\JoinColumn(name="commision_contract_id", referencedColumnName="id")
     */
    private $commisionContract;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SaleContract
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return SaleContract
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set buyer
     *
     * @param \SergeiK\AvangardBundle\Entity\Client $buyer
     * @return SaleContract
     */
    public function setBuyer(\SergeiK\AvangardBundle\Entity\Client $buyer = null)
    {
        $this->buyer = $buyer;
    
        return $this;
    }

    /**
     * Get buyer
     *
     * @return \SergeiK\AvangardBundle\Entity\Client 
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set commisionContract
     *
     * @param \SergeiK\AvangardBundle\Entity\CommisionContract $commisionContract
     * @return SaleContract
     */
    public function setCommisionContract(\SergeiK\AvangardBundle\Entity\CommisionContract $commisionContract = null)
    {
        $this->commisionContract = $commisionContract;
    
        return $this;
    }

    /**
     * Get commisionContract
     *
     * @return \SergeiK\AvangardBundle\Entity\CommisionContract 
     */
    public function getCommisionContract()
    {
        return $this->commisionContract;
    }
}