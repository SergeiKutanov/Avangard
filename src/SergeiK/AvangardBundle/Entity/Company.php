<?php

namespace SergeiK\AvangardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="INN", type="string", length=255)
     */
    private $iNN;

    /**
     * @var string
     *
     * @ORM\Column(name="KPP", type="string", length=255)
     */
    private $kPP;

    /**
     * @var string
     *
     * @ORM\Column(name="bankAccountNumber", type="string", length=255)
     */
    private $bankAccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="corrAcountNumber", type="string", length=255)
     */
    private $corrAcountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="BIK", type="string", length=255)
     */
    private $bIK;

    /**
     * @var string
     *
     * @ORM\Column(name="bankName", type="string", length=255)
     */
    private $bankName;


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
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Company
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
     * Set iNN
     *
     * @param string $iNN
     * @return Company
     */
    public function setINN($iNN)
    {
        $this->iNN = $iNN;
    
        return $this;
    }

    /**
     * Get iNN
     *
     * @return string 
     */
    public function getINN()
    {
        return $this->iNN;
    }

    /**
     * Set kPP
     *
     * @param string $kPP
     * @return Company
     */
    public function setKPP($kPP)
    {
        $this->kPP = $kPP;
    
        return $this;
    }

    /**
     * Get kPP
     *
     * @return string 
     */
    public function getKPP()
    {
        return $this->kPP;
    }

    /**
     * Set bankAccountNumber
     *
     * @param string $bankAccountNumber
     * @return Company
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;
    
        return $this;
    }

    /**
     * Get bankAccountNumber
     *
     * @return string 
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * Set с�corrAcountNumber
     *
     * @param string $с�corrAcountNumber
     * @return Company
     */
    public function setCorrAcountNumber($corrAcountNumber)
    {
        $this->corrAcountNumber = $corrAcountNumber;
    
        return $this;
    }

    /**
     * Get corrAcountNumber
     *
     * @return string 
     */
    public function getCorrAcountNumber()
    {
        return $this->corrAcountNumber;
    }

    /**
     * Set bIK
     *
     * @param string $bIK
     * @return Company
     */
    public function setBIK($bIK)
    {
        $this->bIK = $bIK;
    
        return $this;
    }

    /**
     * Get bIK
     *
     * @return string 
     */
    public function getBIK()
    {
        return $this->bIK;
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     * @return Company
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    
        return $this;
    }

    /**
     * Get bankName
     *
     * @return string 
     */
    public function getBankName()
    {
        return $this->bankName;
    }
}
