<?php
namespace Drupal\extramodule\ParamConverter;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Config\ConfigFactoryInterface;


class ExtramoduleParamConverter implements ParamConverterInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  public function __construct(ConfigFactoryInterface $configFactory){
    $this->configFactory = $configFactory;

  }

  public function convert($value, $definition, $name, array $defaults) {
    return $this->configFactory->get($value)->getRawData();
  }

  public function applies($definition, $name, Route $route) {
    if (!empty($definition['type']) && $definition['type'] == 'config_name') {
      return TRUE;
    }
    return FALSE;
  }

}
