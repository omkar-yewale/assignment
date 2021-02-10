<?php

namespace Drupal\site_config_api\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('system.site_information_settings')) {
      $route->setDefault('_form', 'Drupal\site_config_api\Form\ExtendedSiteInformationForm');
    }
  }

}
