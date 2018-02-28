<?php

namespace WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="WorkshopBundle\Repository\EmailRepository")
 */
class Email
{
    /**
     * @ORM\ManyToOne(targetEntity="WorkshopBundle\Entity\User", inversedBy="emails")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
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
     * @ORM\Column(name="emailAddress", type="string", length=255, nullable=true)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="emailType", type="string", length=255, nullable=true)
     */
    private $emailType;


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
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return Email
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set emailType
     *
     * @param string $emailType
     *
     * @return Email
     */
    public function setEmailType($emailType)
    {
        $this->emailType = $emailType;

        return $this;
    }

    /**
     * Get emailType
     *
     * @return string
     */
    public function getEmailType()
    {
        return $this->emailType;
    }

    /**
     * Set user
     *
     * @param \WorkshopBundle\Entity\User $user
     *
     * @return Email
     */
    public function setUser(\WorkshopBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WorkshopBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
