<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $last_name;

    /**
     * @var int
     *
     * @ORM\Column(name="cc", type="integer")
     */
    private $cc;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(name="salary", type="integer")
     */
    private $salary;



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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get cc
     *
     * @return int
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Get cc
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get salary
     *
     * @return int
     */
    public function getSalary()
    {
        return $this->salary;
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
     * Set last_name
     *
     * @param string $last_name
     *
     * @return User
     */
    public function setLastName($name)
    {
        $this->last_name = $name;

        return $this;
    }

    /**
     * Set cc
     *
     * @param int $cc
     *
     * @return User
     */
    public function setCc($name)
    {
        $this->cc = $name;

        return $this;
    }

    /**
     * Set phone
     *
     * @param int $phone
     *
     * @return User
     */
    public function setPhone($name)
    {
        $this->phone = $name;

        return $this;
    }

    /**
     * Set salary
     *
     * @param int $salary
     *
     * @return User
     */
    public function setSalary($name)
    {
        $this->salary = $name;

        return $this;
    }
}

