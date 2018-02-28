<?php

namespace WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="WorkshopBundle\Repository\UserRepository")
 */
class User
{
     /**
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="user")
     */
    private $phones;
    
    /**
     * @ORM\ManyToOne(targetEntity="WorkshopBundle\Entity\Address", inversedBy="users")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
    
    /**
     * @ORM\OneToMany(targetEntity="Email", mappedBy="user")
     */
    private $emails;
    
    /**
     * @ORM\ManyToMany(targetEntity="Groups", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    private $groups;
    
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function getFullUserData() {
        return sprintf("%s %s", $this->name, $this->surname);
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add phone
     *
     * @param \WorkshopBundle\Entity\Phone $phone
     *
     * @return User
     */
    public function addPhone(\WorkshopBundle\Entity\Phone $phone)
    {
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \WorkshopBundle\Entity\Phone $phone
     */
    public function removePhone(\WorkshopBundle\Entity\Phone $phone)
    {
        $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set address
     *
     * @param \WorkshopBundle\Entity\Address $address
     *
     * @return User
     */
    public function setAddress(\WorkshopBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \WorkshopBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add email
     *
     * @param \WorkshopBundle\Entity\Email $email
     *
     * @return User
     */
    public function addEmail(\WorkshopBundle\Entity\Email $email)
    {
        $this->emails[] = $email;

        return $this;
    }

    /**
     * Remove email
     *
     * @param \WorkshopBundle\Entity\Email $email
     */
    public function removeEmail(\WorkshopBundle\Entity\Email $email)
    {
        $this->emails->removeElement($email);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add group
     *
     * @param \WorkshopBundle\Entity\Group $group
     *
     * @return User
     */
    public function addGroup(\WorkshopBundle\Entity\Groups $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \WorkshopBundle\Entity\Group $group
     */
    public function removeGroup(\WorkshopBundle\Entity\Groups $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
