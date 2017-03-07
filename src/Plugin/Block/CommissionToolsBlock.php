<?php

namespace Drupal\quote_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Link;

/**
  * Provides a node cached block that displays stuff
  *
  * @Block(
  *   id = "commission_tools_block",
  *   admin_label = @Translation("Commission Page Tools")
  * )
  */

class CommissionToolsBlock extends BlockBase{
  public function build() {
    $build = array();
    //if node is found from routeMatch create a markup with node ID's.
      /* @var $commission \Drupal\quote_module\CommissionEntityInterface */
    if ($commission = \Drupal::routeMatch()->getParameter('commission_entity')) {
      $painter = $commission->get('user_id')->getString();
      $customer = $commission->get('customer')->getString();
      $cUser = \Drupal::currentUser()->id();
      if($cUser == $painter) {
          //if they haven't signed but the customer has
        if($commission->get('field_painter_signature') == true && $commission->get('field_customer_signature') == false) {

            $SignCommissionLink = Link::createFromRoute($this->t('Review and Sign'), 'entity.commission_entity.painter_sign',
                array('commission_entity' => $commission->id())
            )->toString();
            $build['commission_id'] = array(
                '#markup' => $this->t('@SignCommissionLink',
                    ['@SignCommissionLink' => $SignCommissionLink]),
            );
        }
          //if the customer hasn't signed
        elseif ($commission->get('field_customer_signature') == true) {
            $EditCommissionLink = Link::createFromRoute($this->t('Edit this Commission'), 'entity.commission_entity.painter_edit_form',
                array('commission_entity' => $commission->id())
            )->toString();
            $build['commission_id'] = array(
                '#markup' => $this->t('@EditCommissionLink',
                    ['@EditCommissionLink' => $EditCommissionLink]),
            );
        }
      } elseif ($cUser == $customer) {
          $SignCommissionLink = Link::createFromRoute($this->t('Review and Sign'), 'entity.commission_entity.customer_sign',
              array('commission_entity' => $commission->id())
          )->toString();
          $build['commission_id'] = array(
              '#markup' => $this->t('@SignCommissionLink',
                  ['@SignCommissionLink' => $SignCommissionLink]),
          );
      }
    }
    return $build;
  }

  public function getCacheTags() {
    //with this when your node changes your block will rebuild
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      //if there is node add its cachetag
      return Cache::mergeTags(parent::getCacheTags(), array('node:' . $node->id()));
    } else {
      //return default tags instead
      return parent::getCacheTags();
    }
  }

  public function getCacheContexts() {
    //if you depend on \Drupal::routeMatch()
    //you must set context of this block with 'route' context tag.
    //every new route this block will rebuild
    return Cache::mergeContexts(parent::getCacheContexts(), array('route'));
  }
}
