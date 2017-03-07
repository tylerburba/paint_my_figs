<?php
/**
 * Created by PhpStorm.
 * User: Tyler
 * Date: 2/20/2017
 * Time: 11:17 AM
 */

namespace Drupal\quote_module;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of commission entity entities.
 *
 * @ingroup quote_module
 */
class CommissionEntityListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('commission entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\quote_module\Entity\CommissionEntity */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.commission_entity.edit_form', array(
          'commission_entity' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}