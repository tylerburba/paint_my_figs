<?php

namespace Drupal\quote_module\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

/**
 * Form controller for Quote entity edit forms.
 *
 * @ingroup quote_module
 */
class QuoteEntityEditForm extends ContentEntityForm {
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, NodeInterface $node = Null) {
    /* @var $entity \Drupal\quote_module\Entity\QuoteEntity */
    /* @var $node \Drupal\node\NodeInterface */
    $form = parent::buildForm($form, $form_state);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Quote entity.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Quote entity.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.quote_entity.canonical', ['quote_entity' => $entity->id()]);
  }

}
