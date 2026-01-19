<?php

class Book
{
    private ?int $id;
    private int $userId;
    private string $title;
    private string $author;
    private ?string $description;
    private ?string $image;
    private bool $isAvailable;
    private \DateTime $createdAt;

    private ?string $username = null;
    private ?string $userEmail = null;
    private ?string $userCreatedAt = null;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->userId = $data['user_id'];
        $this->title = $data['title'];
        $this->author = $data['author'];
        $this->description = $data['description'] ?? null;
        $this->image = $data['image'] ?? null;
        $this->isAvailable = (bool) ($data['is_available'] ?? true);
        $this->createdAt = new \DateTime($data['created_at']);

        if (isset($data['username'])) {
            $this->username = $data['username'];
        }
        if (isset($data['email'])) {
            $this->userEmail = $data['email'];
        }
        if (isset($data['user_created_at'])) {
            $this->userCreatedAt = $data['user_created_at'];
        }
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    // Getters pour les propriétés de jointure
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function getUserCreatedAt(): ?string
    {
        return $this->userCreatedAt;
    }

    // Setters
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function setIsAvailable(bool $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }
}
