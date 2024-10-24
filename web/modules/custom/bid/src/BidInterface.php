<?php

namespace Drupal\bid;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a bid entity type.
 */
interface BidInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the bid creation timestamp.
   *
   * @return int
   *   Creation timestamp of the bid.
   */
  public function getCreatedTime();

  /**
   * Sets the bid creation timestamp.
   *
   * @param int $timestamp
   *   The bid creation timestamp.
   *
   * @return \Drupal\bid\BidInterface
   *   The called bid entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the bid status.
   *
   * @return bool
   *   TRUE if the bid is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the bid status.
   *
   * @param bool $status
   *   TRUE to enable this bid, FALSE to disable.
   *
   * @return \Drupal\bid\BidInterface
   *   The called bid entity.
   */
  public function setStatus($status);

}
