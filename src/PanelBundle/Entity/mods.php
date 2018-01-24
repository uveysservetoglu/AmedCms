<?php

namespace PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mods
 *
 * @ORM\Table(name="mods")
 * @ORM\Entity(repositoryClass="PanelBundle\Repository\modsRepository")
 */
class mods
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
     * @ORM\Column(name="mod_name", type="string", length=255)
     */
    private $modName;


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
     * Set modName
     *
     * @param string $modName
     *
     * @return mods
     */
    public function setModName($modName)
    {
        $this->modName = $modName;

        return $this;
    }

    /**
     * Get modName
     *
     * @return string
     */
    public function getModName()
    {
        return $this->modName;
    }
}

