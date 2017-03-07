<?php

namespace Drupal\quote_module;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Quote entity entities.
 *
 * @ingroup quote_module
 */
interface QuoteEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the Quote entity name.
   *
   * @return string
   *   Name of the Quote entity.
   */
  public function getName();

  /**
   * Sets the Quote entity name.
   *
   * @param string $name
   *   The Quote entity name.
   *
   * @return \Drupal\quote_module\QuoteEntityInterface
   *   The called Quote entity entity.
   */
  public function setName($name);

  /**
   * Gets the Quote entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Quote entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Quote entity creation timestamp.
   *
   * @param int $timestamp
   *   The Quote entity creation timestamp.
   *
   * @return \Drupal\quote_module\QuoteEntityInterface
   *   The called Quote entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Quote entity published status indicator.
   *
   * Unpublished Quote entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Quote entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Quote entity.
   *
   * @param bool $published
   *   TRUE to set this Quote entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\quote_module\QuoteEntityInterface
   *   The called Quote entity entity.
   */
  public function setPublished($published);

}
