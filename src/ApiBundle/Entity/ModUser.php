<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModUser
 *
 * @ORM\Table(name="mod_user")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ModUserRepository")
 */
class ModUser
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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="name_surname", type="string", length=150)
     */
    private $nameSurname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobil", type="string", length=12, nullable=true)
     */
    private $mobil;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=true)
     */
    private $upDate;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=155)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sid", type="string", length=255, nullable=true)
     */
    private $sid;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20)
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=55, nullable=true)
     */
    private $image;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set groupId.
     *
     * @param int $groupId
     *
     * @return ModUser
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return ModUser
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set nameSurname.
     *
     * @param string $nameSurname
     *
     * @return ModUser
     */
    public function setNameSurname($nameSurname)
    {
        $this->nameSurname = $nameSurname;

        return $this;
    }

    /**
     * Get nameSurname.
     *
     * @return string
     */
    public function getNameSurname()
    {
        return $this->nameSurname;
    }

    /**
     * Set mobil.
     *
     * @param string|null $mobil
     *
     * @return ModUser
     */
    public function setMobil($mobil = null)
    {
        $this->mobil = $mobil;

        return $this;
    }

    /**
     * Get mobil.
     *
     * @return string|null
     */
    public function getMobil()
    {
        return $this->mobil;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return ModUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address.
     *
     * @param string|null $address
     *
     * @return ModUser
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set job.
     *
     * @param string $job
     *
     * @return ModUser
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job.
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set website.
     *
     * @param string $website
     *
     * @return ModUser
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website.
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set birthday.
     *
     * @param \DateTime|null $birthday
     *
     * @return ModUser
     */
    public function setBirthday($birthday = null)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday.
     *
     * @return \DateTime|null
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set upDate.
     *
     * @param \DateTime|null $upDate
     *
     * @return ModUser
     */
    public function setUpDate($upDate = null)
    {
        $this->upDate = $upDate;

        return $this;
    }

    /**
     * Get upDate.
     *
     * @return \DateTime|null
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return ModUser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return ModUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set sid.
     *
     * @param string|null $sid
     *
     * @return ModUser
     */
    public function setSid($sid = null)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid.
     *
     * @return string|null
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return ModUser
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return ModUser
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }
}
