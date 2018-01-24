<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModUserRoll
 *
 * @ORM\Table(name="mod_user_roll")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\ModUserRollRepository")
 */
class ModUserRoll
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
     * @ORM\Column(name="mod_id", type="integer")
     */
    private $modId;

    /**
     * @var string
     *
     * @ORM\Column(name="roll_name", type="string", length=100)
     */
    private $rollName;


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
     * Set modId
     *
     * @param integer $modId
     *
     * @return ModUserRoll
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

    /**
     * Set rollName
     *
     * @param string $rollName
     *
     * @return ModUserRoll
     */
    public function setRollName($rollName)
    {
        $this->rollName = $rollName;

        return $this;
    }

    /**
     * Get rollName
     *
     * @return string
     */
    public function getRollName()
    {
        return $this->rollName;
    }
}

