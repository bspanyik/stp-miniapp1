<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DataRepository")
 */
class Data
{
    const DIRECTION_ARRIVAL = 'Érkezés';
    const DIRECTION_DEPARTURE = 'Távozás';
    const DIRECTIONS = [
        self::DIRECTION_ARRIVAL,
        self::DIRECTION_DEPARTURE
    ];

    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="data")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="RFID", name="RFID")
     */
    private $user;

    /**
     * @var DateTimeInterface
     *
         * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $direction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User

    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTime(): ?DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        if (!in_array($direction, self::DIRECTIONS)) {
            throw new InvalidArgumentException();
        }

        $this->direction = $direction;

        return $this;
    }
}
