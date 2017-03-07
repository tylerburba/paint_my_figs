<?php

/**
 * Created by PhpStorm.
 * User: Tyler
 * Date: 2/10/2017
 * Time: 8:29 PM
 */

namespace Drupal\quote_module\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
//use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\node\NodeInterface;

class QuoteModuleMenuLinkDerivative extends DeriverBase implements ContainerDeriverInterface{
    public static function create(ContainerInterface $container, $base_plugin_id) {
        return new static();
    }

    public function getDerivativeDefinitions($base_plugin_definition)
    {
        $links = array();
        /* @var $node \Drupal\node\NodeInterface */
        // Get all nodes of type painter
//        $nodeQuery = \Drupal::entityQuery('node');
//        $nodeQuery->condition('type', 'painter_page');
//        $nodeQuery->condition('status', TRUE);
//        $ids = $nodeQuery->execute();
//        $ids = array_values($ids);
//
//        $nodes = Node::loadMultiple($ids);
//
//        foreach($nodes as $node) {
//            $links['quote_module_menulink_' . $node->id()] = [
//                    'title' => $node->get('title')->getString(),
//                    'menu_name' => 'tools',
//                    'route_name' => 'entity.quote_entity.add_dynamic',
//                    'route_parameters' => [
//                        'node' => $node->id(),
//                    ],
//                ] +$base_plugin_definition;
//        }

//        $node = \Drupal::routeMatch()->getParameter('node');
//        if($node->getType() == 'painter_page'){
//            $links['quote_module_menulink_' . $node->id()] = [
//                'title' => 'Request a Quote',
//                'menu_name' => 'tools',
//                'route_name' => 'entity.quote_entity.add_dynamic',
//                'route_parameters' => [
//                    'node' => $node->id(),
//                ],
//            ] +$base_plugin_definition;
//        }
        $links = $base_plugin_definition;
        return $links;
    }
}