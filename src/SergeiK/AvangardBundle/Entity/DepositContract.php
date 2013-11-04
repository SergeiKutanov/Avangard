<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DepositContract
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DepositContract
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
     * @var float
     *
     * @ORM\Column(name="amount", type="decimal")
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="carPrice", type="decimal")
     */
    private $carPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date")
     */
    private $deadline;

    /**
     * @var \SergeiK\AvangardBundle\Entity\CommisionContract
     * @ORM\ManyToOne(targetEntity="CommisionContract")
     * @ORM\JoinColumn(name="commision_contract_id", referencedColumnName="id")
     */
    private $commisionContract;

    /**
     * @var \SergeiK\AvangardBundle\Entity\Client
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     */
    private $buyer;


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
     * @return DepositContract
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
     * Set amount
     *
     * @param float $amount
     * @return DepositContract
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set carPrice
     *
     * @param float $carPrice
     * @return DepositContract
     */
    public function setCarPrice($carPrice)
    {
        $this->carPrice = $carPrice;
    
        return $this;
    }

    /**
     * Get carPrice
     *
     * @return float 
     */
    public function getCarPrice()
    {
        return $this->carPrice;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return DepositContract
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    
        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set commisionContract
     *
     * @param \SergeiK\AvangardBundle\Entity\CommisionContract $commisionContract
     * @return DepositContract
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

    /**
     * Set buyer
     *
     * @param \SergeiK\AvangardBundle\Entity\Client $buyer
     * @return DepositContract
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
}