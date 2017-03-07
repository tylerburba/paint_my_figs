<?php

/**
 * @file
 * Contains quote_entity.page.inc.
 *
 * Page callback for Quote entity entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Quote entity templates.
 *
 * Default template: quote_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_quote_entity(array &$variables) {
  // Fetch QuoteEntity Entity Object.
  $quote_entity = $variables['elements']['#quote_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
