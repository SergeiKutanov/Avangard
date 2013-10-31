<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommisionContract
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CommisionContract
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
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="commisioner_id", referencedColumnName="id")
     */
    private $commisioner;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="commisioner_agent_id", referencedColumnName="id")
     */
    private $commisionerAgent;

    /**
     * @ORM\ManyToOne(targetEntity="Car")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var integer
     *
     * @ORM\Column(name="minPrice", type="integer")
     */
    private $minPrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="minPriceEmpty", type="boolean", nullable=true)
     */
    private $minPriceEmpty;

    /**
     * @var integer
     *
     * @ORM\Column(name="reward", type="integer")
     */
    private $reward;


     /**
     * @var boolean
     *
     * @ORM\Column(name="rewardEmpty", type="boolean", nullable=true)
     */
    private $rewardEmpty;

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
     * @return CommisionContract
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
     * Set minPrice
     *
     * @param integer $minPrice
     * @return CommisionContract
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;
    
        return $this;
    }

    /**
     * Get minPrice
     *
     * @return integer 
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set minPriceEmpty
     *
     * @param boolean $minPriceEmpty
     * @return CommisionContract
     */
    public function setMinPriceEmpty($minPriceEmpty)
    {
        $this->minPriceEmpty = $minPriceEmpty;
    
        return $this;
    }

    /**
     * Get minPriceEmpty
     *
     * @return boolean 
     */
    public function getMinPriceEmpty()
    {
        return $this->minPriceEmpty;
    }

    /**
     * Set reward
     *
     * @param integer $reward
     * @return CommisionContract
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
    
        return $this;
    }

    /**
     * Get reward
     *
     * @return integer 
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Set rewardEmpty
     *
     * @param boolean $rewardEmpty
     * @return CommisionContract
     */
    public function setRewardEmpty($rewardEmpty)
    {
        $this->rewardEmpty = $rewardEmpty;
    
        return $this;
    }

    /**
     * Get rewardEmpty
     *
     * @return boolean 
     */
    public function getRewardEmpty()
    {
        return $this->rewardEmpty;
    }

    /**
     * Set commisioner
     *
     * @param \SergeiK\AvangardBundle\Entity\Client $commisioner
     * @return CommisionContract
     */
    public function setCommisioner(\SergeiK\AvangardBundle\Entity\Client $commisioner = null)
    {
        $this->commisioner = $commisioner;
    
        return $this;
    }

    /**
     * Get commisioner
     *
     * @return \SergeiK\AvangardBundle\Entity\Client 
     */
    public function getCommisioner()
    {
        return $this->commisioner;
    }

    /**
     * Set commisionerAgent
     *
     * @param \SergeiK\AvangardBundle\Entity\Client $commisionerAgent
     * @return CommisionContract
     */
    public function setCommisionerAgent(\SergeiK\AvangardBundle\Entity\Client $commisionerAgent = null)
    {
        $this->commisionerAgent = $commisionerAgent;
    
        return $this;
    }

    /**
     * Get commisionerAgent
     *
     * @return \SergeiK\AvangardBundle\Entity\Client 
     */
    public function getCommisionerAgent()
    {
        return $this->commisionerAgent;
    }

    /**
     * Set car
     *
     * @param \SergeiK\AvangardBundle\Entity\Car $car
     * @return CommisionContract
     */
    public function setCar(\SergeiK\AvangardBundle\Entity\Car $car = null)
    {
        $this->car = $car;
    
        return $this;
    }

    /**
     * Get car
     *
     * @return \SergeiK\AvangardBundle\Entity\Car 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set company
     *
     * @param \SergeiK\AvangardBundle\Entity\Company $company
     * @return CommisionContract
     */
    public function setCompany(\SergeiK\AvangardBundle\Entity\Company $company = null)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return \SergeiK\AvangardBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}