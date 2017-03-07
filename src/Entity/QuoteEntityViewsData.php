<?php

namespace Drupal\quote_module\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Quote entity entities.
 */
class QuoteEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['quote_entity']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Quote entity'),
      'help' => $this->t('The Quote entity ID.'),
    );

    return $data;
  }

}
