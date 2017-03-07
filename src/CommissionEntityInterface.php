<?php
/**
 * Created by PhpStorm.
 * User: Tyler
 * Date: 2/20/2017
 * Time: 11:14 AM
 */

namespace Drupal\quote_module;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Quote entity entities.
 *
 * @ingroup quote_module
 */
interface CommissionEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the commission entity name.
   *
   * @return string
   *   Name of the commission entity.
   */
  public function getName();

  /**
   * Sets the commission entity name.
   *
   * @param string $name
   *   The commission entity name.
   *
   * @return \Drupal\quote_module\commissionEntityInterface
   *   The called commission entity entity.
   */
  public function setName($name);

  /**
   * Gets the commission entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the commission entity.
   */
  public function getCreatedTime();

  /**
   * Sets the commission entity creation timestamp.
   *
   * @param int $timestamp
   *   The commission entity creation timestamp.
   *
   * @return \Drupal\quote_module\commissionEntityInterface
   *   The called commission entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the commission entity published status indicator.
   *
   * Unpublished commission entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the commission entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a commission entity.
   *
   * @param bool $published
   *   TRUE to set this commission entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\quote_module\commissionEntityInterface
   *   The called commission entity entity.
   */
  public function setPublished($published);

}