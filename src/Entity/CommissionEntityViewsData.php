<?php
/**
 * Created by PhpStorm.
 * User: Tyler
 * Date: 2/20/2017
 * Time: 10:41 AM
 */

namespace Drupal\quote_module\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

class CommissionEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['commission_entity']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('commission entity'),
      'help' => $this->t('The commission entity ID.'),
    );

    return $data;
  }

}