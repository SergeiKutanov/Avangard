<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SergeiK\AvangardBundle\Entity\CarRepository")
 */
class Car
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
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="VIN", type="string", length=20)
     */
    private $vIN;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="engineNumber", type="string", length=255)
     */
    private $engineNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="chassisNumber", type="string", length=255)
     */
    private $chassisNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="bodyNumber", type="string", length=20)
     */
    private $bodyNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="enginePowerHP", type="string", length=10)
     */
    private $enginePowerHP;

    /**
     * @var string
     *
     * @ORM\Column(name="enginePowerKWt", type="string", length=10)
     */
    private $enginePowerKWt;

    /**
     * @var integer
     *
     * @ORM\Column(name="engineVolume", type="integer")
     */
    private $engineVolume;

    /**
     * @var string
     *
     * @ORM\Column(name="PTSNumber", type="string", length=255)
     */
    private $pTSNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="issuerName", type="string", length=255)
     */
    private $issuerName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="issueDate", type="date")
     */
    private $issueDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(name="adds", type="text", nullable=true)
     */
    private $adds;

    /**
     * @var string
     * @ORM\Column(name="transmission", type="string", nullable=true)
     */
    private $transmission;


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
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set vIN
     *
     * @param string $vIN
     * @return Car
     */
    public function setVIN($vIN)
    {
        $this->vIN = $vIN;

        return $this;
    }

    /**
     * Get vIN
     *
     * @return string
     */
    public function getVIN()
    {
        return $this->vIN;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Car
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set engineNumber
     *
     * @param string $engineNumber
     * @return Car
     */
    public function setEngineNumber($engineNumber)
    {
        $this->engineNumber = $engineNumber;

        return $this;
    }

    /**
     * Get engineNumber
     *
     * @return string
     */
    public function getEngineNumber()
    {
        return $this->engineNumber;
    }

    /**
     * Set chassisNumber
     *
     * @param string $chassisNumber
     * @return Car
     */
    public function setChassisNumber($chassisNumber)
    {
        $this->chassisNumber = $chassisNumber;

        return $this;
    }

    /**
     * Get chassisNumber
     *
     * @return string
     */
    public function getChassisNumber()
    {
        return $this->chassisNumber;
    }

    /**
     * Set bodyNumber
     *
     * @param string $bodyNumber
     * @return Car
     */
    public function setBodyNumber($bodyNumber)
    {
        $this->bodyNumber = $bodyNumber;

        return $this;
    }

    /**
     * Get bodyNumber
     *
     * @return string
     */
    public function getBodyNumber()
    {
        return $this->bodyNumber;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Car
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set enginePowerHP
     *
     * @param float $enginePowerHP
     * @return Car
     */
    public function setEnginePowerHP($enginePowerHP)
    {
        $this->enginePowerHP = $enginePowerHP;

        return $this;
    }

    /**
     * Get enginePowerHP
     *
     * @return float
     */
    public function getEnginePowerHP()
    {
        return $this->enginePowerHP;
    }

    /**
     * Set enginePowerKWt
     *
     * @param float $enginePowerKWt
     * @return Car
     */
    public function setEnginePowerKWt($enginePowerKWt)
    {
        $this->enginePowerKWt = $enginePowerKWt;

        return $this;
    }

    /**
     * Get enginePowerKWt
     *
     * @return float
     */
    public function getEnginePowerKWt()
    {
        return $this->enginePowerKWt;
    }

    /**
     * Set engineVolume
     *
     * @param integer $engineVolume
     * @return Car
     */
    public function setEngineVolume($engineVolume)
    {
        $this->engineVolume = $engineVolume;

        return $this;
    }

    /**
     * Get engineVolume
     *
     * @return integer
     */
    public function getEngineVolume()
    {
        return $this->engineVolume;
    }

    /**
     * Set pTSNumber
     *
     * @param string $pTSNumber
     * @return Car
     */
    public function setPTSNumber($pTSNumber)
    {
        $this->pTSNumber = $pTSNumber;

        return $this;
    }

    /**
     * Get pTSNumber
     *
     * @return string
     */
    public function getPTSNumber()
    {
        return $this->pTSNumber;
    }

    /**
     * Set issuerName
     *
     * @param string $issuerName
     * @return Car
     */
    public function setIssuerName($issuerName)
    {
        $this->issuerName = $issuerName;

        return $this;
    }

    /**
     * Get issuerName
     *
     * @return string
     */
    public function getIssuerName()
    {
        return $this->issuerName;
    }

    /**
     * Set issueDate
     *
     * @param \DateTime $issueDate
     * @return Car
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * Get issueDate
     *
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    public function __toString(){
        $s = '';
        if($this->getYear() != null){
            $s = $this->getModel() . ' - ' . date('Y', $this->getYear()->getTimestamp()) . ' - ' .
                $this->getVIN();
        }
        return $s;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Car
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
     * Set adds
     *
     * @param string $adds
     * @return Car
     */
    public function setAdds($adds)
    {
        $this->adds = $adds;
    
        return $this;
    }

    /**
     * Get adds
     *
     * @return string 
     */
    public function getAdds()
    {
        return $this->adds;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     * @return Car
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    
        return $this;
    }

    /**
     * Get transmission
     *
     * @return string 
     */
    public function getTransmission()
    {
        return $this->transmission;
    }
}