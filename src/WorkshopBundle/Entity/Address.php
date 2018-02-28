<?php

namespace WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="WorkshopBundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="address")
     */
    private $users;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="BuildingNumber", type="integer", nullable=true)
     */
    private $buildingNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="ApartmentNumber", type="integer", nullable=true)
     */
    private $apartmentNumber;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set buildingNumber
     *
     * @param integer $buildingNumber
     *
     * @return Address
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return int
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }
    
    public function getFullAddress() {
        return sprintf("ul. %s %s/%s, %s", $this->street, $this->buildingNumber, $this->apartmentNumber, $this->city);
    }

    /**
     * Set apartmentNumber
     *
     * @param integer $apartmentNumber
     *
     * @return Address
     */
    public function setApartmentNumber($apartmentNumber)
    {
        $this->apartmentNumber = $apartmentNumber;

        return $this;
    }

    /**
     * Get apartmentNumber
     *
     * @return int
     */
    public function getApartmentNumber()
    {
        return $this->apartmentNumber;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \WorkshopBundle\Entity\User $user
     *
     * @return Address
     */
    public function addUser(\WorkshopBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \WorkshopBundle\Entity\User $user
     */
    public function removeUser(\WorkshopBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
