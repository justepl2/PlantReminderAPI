<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *      collectionOperations={
 *          "get",
 *          "post"
 *      }, 
 *      itemOperations={
 *          "get",
 *          "put",
 *          "delete"
 *      },
 *      normalizationContext={"groups"={"plant:read"}},
 *      denormalizationContext={"groups"={"plant:write"}}
 * )
 * @ORM\Entity(repositoryClass=PlantRepository::class)
 */
class Plant
{
    /**
     * @ApiProperty(identifier=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $id;

    /**
     * @var UuidInterface|null
     * @ApiProperty(identifier=true)
     * @ORM\Column(type="string", length=255)
     * @Groups({"plant:read"})
     */
    private $uuid;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     * @Groups({"plant:read", "plant:write"})
     */
    private $specie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"plant:read", "plant:write"})
     */
    private $nickname;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"plant:read", "plant:write"})
     */
    private $waterEvry;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"plant:read", "plant:write"})
     */
    private $description;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getSpecie(): ?string
    {
        return $this->specie;
    }

    public function setSpecie(string $specie): self
    {
        $this->specie = $specie;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getWaterEvry(): ?int
    {
        return $this->waterEvry;
    }

    public function setWaterEvry(int $waterEvry): self
    {
        $this->waterEvry = $waterEvry;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
