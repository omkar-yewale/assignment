<?php

namespace Drupal\site_config_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * This is the api key controller.
 */
class ApiKeyController extends ControllerBase {

  /**
   * Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Creating config factory parameter.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   - $configFactory Variable passed in construct method.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      // Using Service which one we want to use here.
      $container->get('config.factory')
    );
  }

  /**
   * Parameters.
   *
   * @param string $apikey
   *   - Getting Site API key form the URL.
   * @param \Drupal\node\NodeInterface $node
   *   - Getting Node ID form the URL.
   *
   * @return Symfony\Component\HttpFoundation\JsonResponse
   *   - Return JsonResponse of the node data.
   */
  public function content($apikey, NodeInterface $node) {
    // Getting api key from basic site setting, to compare with url key.
    $key = $this->configFactory->get('system.site')->get('apikey');

    // Check content type and API Key.
    if ($node->getType() == 'page' && $key == $apikey) {

      // Return Json data Responsed if the data exists.
      return new JsonResponse($node->toArray(), 200, ['Content-Type' => 'application/json']);
    }
    else {
      // Return access denied if the data not exists,
      // and content type was not matched.
      return new JsonResponse(["error" => "access denied"], 401, ['Content-Type' => 'application/json']);
    }
  }

}
