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
    const PERSON = 1;
    const COMPANY = 2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="client_type", type="smallint", nullable=false)
     */
    private $clientType;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middleName", type="string", length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="passportSeries", type="string", length=5, nullable=true)
     */
    private $passportSeries;

    /**
     * @var string
     *
     * @ORM\Column(name="passportNumber", type="string", length=10, nullable=true)
     */
    private $passportNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="passportIssuer", type="string", length=255, nullable=true)
     */
    private $passportIssuer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="passportIssueDate", type="datetime", nullable=true)
     */
    private $passportIssueDate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     * @ORM\Column(name="inn", type="string", length=255, nullable=true)
     */
    private $inn;

    /**
     * @var string
     * @ORM\Column(name="kpp", type="string", length=255, nullable=true)
     */
    private $kpp;

    /**
     * @var string
     * @ORM\Column(name="acc_number", type="string", length=255, nullable=true)
     */
    private $accNumber;

    /**
     * @var string
     * @ORM\Column(name="cor_number", type="string", length=255, nullable=true)
     */
    private $cor_number;

    /**
     * @var string
     * @ORM\Column(name="bik", type="string", length=255, nullable=true)
     */
    private $bik;

    /**
     * @var string
     * @ORM\Column(name="bank_name", type="string", length=255, nullable=true)
     */
    private $bankName;


    public static function getClientTypesArray(){
        return array(
            self::PERSON    => 'Физическое лицо',
            self::COMPANY   => 'Юридическое лицо'
        );
    }

    public function getClientTypeString(){
        return self::getClientTypeName($this->getClientType());
    }

    public function getClientTypeName($type = false){
        switch($type){
            case self::PERSON       : return 'Физическое лицо';
            case self::COMPANY      : return 'Юридическое лицо';
        }
        return false;
    }


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
     * Get passportSeries
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

    public function __toString(){
        if($this->getClientType() == self::PERSON || $this->getClientType() == null){
            return $this->getLastName() . ' ' .
            $this->getFirstName() . ' ' .
            $this->getMiddleName();
        } else if($this->getClientType() == self::COMPANY){
            return $this->getCompanyName();
        }
    }

    public function getBriefName(){
        $briefName = $this->getLastName() . ' ';
        $briefName .= mb_substr($this->getFirstName(), 0, 1, 'UTF-8') . '. ';
        $briefName .= mb_substr($this->getMiddleName(), 0, 1, 'UTF-8') . '.';
        return $briefName;

    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set clientType
     *
     * @param integer $clientType
     * @return Client
     */
    public function setClientType($clientType)
    {
        $this->clientType = $clientType;
    
        return $this;
    }

    /**
     * Get clientType
     *
     * @return integer 
     */
    public function getClientType()
    {
        return $this->clientType;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    
        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set inn
     *
     * @param string $inn
     * @return Client
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    
        return $this;
    }

    /**
     * Get inn
     *
     * @return string 
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * Set kpp
     *
     * @param string $kpp
     * @return Client
     */
    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
    
        return $this;
    }

    /**
     * Get kpp
     *
     * @return string 
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * Set accNumber
     *
     * @param string $accNumber
     * @return Client
     */
    public function setAccNumber($accNumber)
    {
        $this->accNumber = $accNumber;
    
        return $this;
    }

    /**
     * Get accNumber
     *
     * @return string 
     */
    public function getAccNumber()
    {
        return $this->accNumber;
    }

    /**
     * Set cor_number
     *
     * @param string $corNumber
     * @return Client
     */
    public function setCorNumber($corNumber)
    {
        $this->cor_number = $corNumber;
    
        return $this;
    }

    /**
     * Get cor_number
     *
     * @return string 
     */
    public function getCorNumber()
    {
        return $this->cor_number;
    }

    /**
     * Set bik
     *
     * @param string $bik
     * @return Client
     */
    public function setBik($bik)
    {
        $this->bik = $bik;
    
        return $this;
    }

    /**
     * Get bik
     *
     * @return string 
     */
    public function getBik()
    {
        return $this->bik;
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     * @return Client
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