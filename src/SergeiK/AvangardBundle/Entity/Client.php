<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SergeiK\AvangardBundle\Entity\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middleName", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="passportSeries", type="string", length=5)
     */
    private $ppassportSeriea;

    /**
     * @var string
     *
     * @ORM\Column(name="passportNumber", type="string", length=10)
     */
    private $passportNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="passportIssuer", type="string", length=255)
     */
    private $passportIssuer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="passportIssueDate", type="datetime")
     */
    private $passportIssueDate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;


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
     * Set firstName
     *
     * @param string $firstName
     * @return Client
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return Client
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    
        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Client
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set з�passportSerieы
     *
     * @param string $з�passportSerieы
     * @return Client
     */
    public function setPassportSeries($passportSeries)
    {
        $this->passportSeries = $passportSeries;
    
        return $this;
    }

    /**
     * Get з�passportSerieы
     *
     * @return string 
     */
    public function getPassportSeries()
    {
        return $this->passportSeries;
    }

    /**
     * Set passportNumber
     *
     * @param string $passportNumber
     * @return Client
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;
    
        return $this;
    }

    /**
     * Get passportNumber
     *
     * @return string 
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * Set passportIssuer
     *
     * @param string $passportIssuer
     * @return Client
     */
    public function setPassportIssuer($passportIssuer)
    {
        $this->passportIssuer = $passportIssuer;
    
        return $this;
    }

    /**
     * Get passportIssuer
     *
     * @return string 
     */
    public function getPassportIssuer()
    {
        return $this->passportIssuer;
    }

    /**
     * Set passportIssueDate
     *
     * @param \DateTime $passportIssueDate
     * @return Client
     */
    public function setPassportIssueDate($passportIssueDate)
    {
        $this->passportIssueDate = $passportIssueDate;
    
        return $this;
    }

    /**
     * Get passportIssueDate
     *
     * @return \DateTime 
     */
    public function getPassportIssueDate()
    {
        return $this->passportIssueDate;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Client
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set ppassportSeriea
     *
     * @param string $ppassportSeriea
     * @return Client
     */
    public function setPpassportSeriea($ppassportSeriea)
    {
        $this->ppassportSeriea = $ppassportSeriea;
    
        return $this;
    }

    /**
     * Get ppassportSeriea
     *
     * @return string 
     */
    public function getPpassportSeriea()
    {
        return $this->ppassportSeriea;
    }
}