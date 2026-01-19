<?php

class Message
{
    private ?int $id;
    private int $senderId;
    private int $receiverId;
    private string $content;
    private bool $isRead;
    private \DateTime $createdAt;

    // Propriétés pour la jointure
    private ?string $senderUsername = null;
    private ?string $senderAvatar = null;
    private ?string $receiverUsername = null;
    private ?string $receiverAvatar = null;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->senderId = $data['sender_id'];
        $this->receiverId = $data['receiver_id'];
        $this->content = $data['content'];
        $this->isRead = (bool) ($data['is_read'] ?? false);
        $this->createdAt = new \DateTime($data['created_at']);

        if (isset($data['sender_username'])) {
            $this->senderUsername = $data['sender_username'];
        }
        if (isset($data['sender_avatar'])) {
            $this->senderAvatar = $data['sender_avatar'];
        }
        if (isset($data['receiver_username'])) {
            $this->receiverUsername = $data['receiver_username'];
        }
        if (isset($data['receiver_avatar'])) {
            $this->receiverAvatar = $data['receiver_avatar'];
        }
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getSenderId(): int { return $this->senderId; }
    public function getReceiverId(): int { return $this->receiverId; }
    public function getContent(): string { return $this->content; }
    public function isRead(): bool { return $this->isRead; }
    public function getCreatedAt(): \DateTime { return $this->createdAt; }
    public function getSenderUsername(): ?string { return $this->senderUsername; }
    public function getSenderAvatar(): ?string { return $this->senderAvatar; }
    public function getReceiverUsername(): ?string { return $this->receiverUsername; }
    public function getReceiverAvatar(): ?string { return $this->receiverAvatar; }
}
