<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $channel;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private string $channelIcon;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $link;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private string $value;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Contacts")
     * @ORM\JoinColumn(nullable=false)
     */
    private User $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getChannelIcon(): string
    {
        return $this->channelIcon;
    }

    public function setChannelIcon(string $channelIcon): Contact
    {
        $this->channelIcon = $channelIcon;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
