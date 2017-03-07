<?php

namespace Drupal\quote_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Link;

/**
  * Provides a node cached block that displays stuff
  *
  * @Block(
  *   id = "painter_page_block",
  *   admin_label = @Translation("Painter Page Tools")
  * )
  */

class PainterPageBlock extends BlockBase{
  public function build() {
    $build = array();
    //if node is found from routeMatch create a markup with node ID's.
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      $RequestQuoteLink = Link::createFromRoute($this->t('Request a Quote'),'entity.quote_entity.add_dynamic',array(
        'node' => $node->id()
      ))->toString();
      $build['node_id'] = array(
        '#markup' => $this->t('@RequestQuoteLink', ['@RequestQuoteLink' => $RequestQuoteLink]),
      );
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
