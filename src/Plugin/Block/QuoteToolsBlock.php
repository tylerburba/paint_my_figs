<?php

namespace Drupal\quote_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Link;

/**
  * Provides a node cached block that displays stuff
  *
  * @Block(
  *   id = "quote_tools_block",
  *   admin_label = @Translation("Quote Page Tools")
  * )
  */

class QuoteToolsBlock extends BlockBase{
  public function build() {
    $build = array();
    //if node is found from routeMatch create a markup with node ID's.
      /* @var $quote \Drupal\quote_module\QuoteEntityInterface */
    if ($quote = \Drupal::routeMatch()->getParameter('quote_entity')) {
      $painter = $quote->get('painter')->getString();
      $cUser = \Drupal::currentUser()->id();
      if($cUser == $painter) {
        $StartCommissionLink = Link::createFromRoute($this->t('Create a commission'), 'entity.commission_entity.create_form',
          array('quote_entity' => $quote->id())
        )->toString();
        $build['quote_id'] = array(
          '#markup' => $this->t('@StartCommissionLink', ['@StartCommissionLink' => $StartCommissionLink]),
        );
      } else {
        $build['quote_id'] = array(
          '#markup' => $this->t('first: @current second: @painter', array('@current' => $cUser, '@painter' => $painter))
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
