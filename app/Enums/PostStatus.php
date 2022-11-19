<?php

namespace App\Enums;

enum PostStatus: string
{
  case PUBLISHED = 'PUBLISHED';
  case UNPUBLISHED = 'UNPUBLISHED';
  case DRAFT = 'DRAFT';

  public static function getColor(string | self $value): string
  {
    if (is_string($value)) {
      return match ($value) {
        self::DRAFT->value => 'warning',
        self::PUBLISHED->value => 'success',
        self::UNPUBLISHED->value => 'danger',
        default => 'secondary'
      };
    }

    return match ($value) {
      self::DRAFT => 'warning',
      self::PUBLISHED => 'success',
      self::UNPUBLISHED => 'danger',
      default => 'secondary'
    };
  }

  public static function getEnumValues(): array
  {
    return array_map(fn (self $status) => $status->value, self::cases());
  }

  /**
   * Get String value of an Enum case
   *
   * @param PostStatus|string $status
   * @return string
   */
  public static function getValue(self | string $status): string
  {
    if (is_string($status)) {
      $status = self::from($status);
    }

    return $status->value;
  }
}
