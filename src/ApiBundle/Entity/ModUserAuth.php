<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModUserAuth
 *
 * @ORM\Table(name="mod_user_auth")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ModUserAuthRepository")
 */
class ModUserAuth
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
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer")
     */
    private $groupId;

    /**
     * @var int
     *
     * @ORM\Column(name="roll_id", type="integer")
     */
    private $rollId;

    /**
     * @var int
     *
     * @ORM\Column(name="mod_id", type="integer")
     */
    private $modId;


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
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return ModUserAuth
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set rollId
     *
     * @param integer $rollId
     *
     * @return ModUserAuth
     */
    public function setRollId($rollId)
    {
        $this->rollId = $rollId;

        return $this;
    }

    /**
     * Get rollId
     *
     * @return int
     */
    public function getRollId()
    {
        return $this->rollId;
    }

    /**
     * Set modId
     *
     * @param integer $modId
     *
     * @return ModUserAuth
     */
    public function setModId($modId)
    {
        $this->modId = $modId;

        return $this;
    }

    /**
     * Get modId
     *
     * @return int
     */
    public function getModId()
    {
        return $this->modId;
    }
}

