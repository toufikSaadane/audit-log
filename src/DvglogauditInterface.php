<?php

namespace Drupal\dvglogaudit;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a dvglogaudit entity type.
 */
interface DvglogauditInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the dvglogaudit title.
   *
   * @return string
   *   Title of the dvglogaudit.
   */
  public function getTitle();

  /**
   * Sets the dvglogaudit title.
   *
   * @param string $title
   *   The dvglogaudit title.
   *
   * @return \Drupal\dvglogaudit\DvglogauditInterface
   *   The called dvglogaudit entity.
   */
  public function setTitle($title);

  /**
   * Gets the dvglogaudit creation timestamp.
   *
   * @return int
   *   Creation timestamp of the dvglogaudit.
   */
  public function getCreatedTime();

  /**
   * Sets the dvglogaudit creation timestamp.
   *
   * @param int $timestamp
   *   The dvglogaudit creation timestamp.
   *
   * @return \Drupal\dvglogaudit\DvglogauditInterface
   *   The called dvglogaudit entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the dvglogaudit status.
   *
   * @return bool
   *   TRUE if the dvglogaudit is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the dvglogaudit status.
   *
   * @param bool $status
   *   TRUE to enable this dvglogaudit, FALSE to disable.
   *
   * @return \Drupal\dvglogaudit\DvglogauditInterface
   *   The called dvglogaudit entity.
   */
  public function setStatus($status);

}
