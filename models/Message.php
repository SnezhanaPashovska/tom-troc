<?php

class Message extends AbstractEntity
{
  protected int $id = -1;
  private int $user_id_sender = -1;
  private int $user_id_receiver = -1;
  private string $text = '';
  private DateTime $created_at;

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setUserIdSender(int $user_id_sender): void
  {
    $this->user_id_sender = $user_id_sender;
  }

  public function getUserIdSender(): int
  {
    return $this->user_id_sender;
  }

  public function setUserIdReceiver(int $user_id_receiver): void
  {
    $this->user_id_receiver = $user_id_receiver;
  }

  public function getUserIdReceiver(): int
  {
    return $this->user_id_receiver;
  }


  public function setText(string $text): void
  {
    $this->text = $text;
  }

  public function getText(): string
  {
    return $this->text;
  }

  public function setCreatedAt(string|DateTime $created_at, string $format = 'Y-m-d H:i:s'): void
  {
    if (is_string($created_at)) {
      $created_at = DateTime::createFromFormat($format, $created_at);
    }
    $this->created_at = $created_at;
  }

  public function getCreatedAt(): DateTime
  {
    return $this->created_at;
  }
}
