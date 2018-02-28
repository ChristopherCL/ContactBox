<?php

namespace WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groups
 *
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="WorkshopBundle\Repository\GroupsRepository")
 */
class Groups
{
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
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
     * @ORM\Column(name="groupName", type="string", length=255, nullable=true)
     */
    private $groupName;

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
     * @return Groups
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

    /**
     * Set groupName
     *
     * @param string $groupName
     *
     * @return Groups
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }
}
