<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModUserGroup
 *
 * @ORM\Table(name="mod_user_group")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\ModUserGroupRepository")
 */
class ModUserGroup
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort;

    /**
     * @var int
     *
     * @ORM\Column(name="alt", type="integer")
     */
    private $alt;

    /**
     * @var int
     *
     * @ORM\Column(name="rolls", type="integer", nullable=true)
     */
    private $rolls;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

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
     * @return ModUserGroup
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return ModUserGroup
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set alt
     *
     * @param integer $alt
     *
     * @return ModUserGroup
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return int
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set rolls
     *
     * @param integer $rolls
     *
     * @return ModUserGroup
     */
    public function setRolls($rolls)
    {
        $this->rolls = $rolls;

        return $this;
    }

    /**
     * Get rolls
     *
     * @return int
     */
    public function getRolls()
    {
        return $this->rolls;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return ModUserGroup
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }


}

