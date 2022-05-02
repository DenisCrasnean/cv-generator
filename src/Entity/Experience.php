<?php
declare(strict_types=1);

namespace App\Entity;

use App\Exception\UnsupportedExperienceType;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    protected const EXPERIENCE_TYPES = [
        'work',
        'internship',
        'freelancing',
        'volunteering',
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private string $location;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeImmutable $startDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private \DateTimeImmutable $endDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $organizationName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $organizationLogo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @throws UnsupportedExperienceType
     */
    public function setType(string $type): self
    {
        if (!in_array($type, self::EXPERIENCE_TYPES)) {
            throw new UnsupportedExperienceType(
                $type.
                ' is not a supported experience type! Available options are: '.
                implode(', ', self::EXPERIENCE_TYPES).'.'
            );
        }

        $this->type = $type;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): \DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    public function setOrganizationName(string $organizationName): self
    {
        $this->organizationName = $organizationName;
        return $this;
    }

    public function getOrganizationLogo(): string
    {
        return $this->organizationLogo;
    }

    public function setOrganizationLogo(string $organizationLogo): self
    {
        $this->organizationLogo = $organizationLogo;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
