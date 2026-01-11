<?php

class Message
{
    private ?int $id;
    private int $senderId;
    private int $receiverId;
    private int $bookId;
    private ?string $subject;
    private string $message;
    private bool $isRead;
    private \DateTime $createdAt;

    public function __construct(
        ?int $id,
        int $senderId,
        int $receiverId,
        int $bookId,
        ?string $subject,
        string $message,
        bool $isRead,
        \DateTime $createdAt
    ) {
        $this->id = $id;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->bookId = $bookId;
        $this->subject = $subject;
        $this->message = $message;
        $this->isRead = $isRead;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function getBookId(): int
    {
        return $this->bookId;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function isRead(): bool
    {
        return $this->isRead;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    // Setters
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function markAsRead(): void
    {
        $this->isRead = true;
    }
}
