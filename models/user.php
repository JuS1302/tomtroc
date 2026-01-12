<?php

class User
{
  private ?int $id;
  private string $username;
  private string $email;
  private string $password;
  private \DateTime $createdAt;
  private ?string $avatar;


  public function __construct(array $data)
  {
      $this->id = $data['id'] ?? null;
      $this->username = $data['username'];
      $this->email = $data['email'];
      $this->password = $data['password'] ?? '';
      $this->createdAt = new \DateTime($data['created_at']);
      $this->avatar= $data['avatar'] ?? null;
  }

  // Getters
  public function getId(): ?int
  {
      return $this->id;
  }

  public function getUsername(): string
  {
      return $this->username;
  }

  public function getEmail(): string
  {
      return $this->email;
  }

  public function getPassword(): string
  {
      return $this->password;
  }

  public function getCreatedAt(): \DateTime
  {
      return $this->createdAt;
  }

  public function getAvatar(): ?string
  {
      return $this->avatar;
  }

  // Setters
  public function setUsername(string $username): void
  {
      $this->username = $username;
  }

  public function setEmail(string $email): void
  {
      $this->email = $email;
  }

  public function setPassword(string $password): void
  {
      $this->password = $password;
  }
  public function setAvatar(?string $avatar): void
  {
      $this->avatar = $avatar;
  }

  public function getAvatarOrInitial(): string
  {
      if ($this->avatar) {
          return 'assets/images/avatars/' . $this->avatar;
      }

      return strtoupper(substr($this->username, 0, 1));
  }
}
