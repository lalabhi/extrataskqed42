<?php
namespace Drupal\extramodule\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UrlController extends ControllerBase {

//  /**
//   * The config factory.
//   *
//   * @var \Drupal\Core\Config\ConfigFactoryInterface
//   */
//  protected $configFactory;
//
//  public function __construct(ConfigFactoryInterface $configFactory) {
//    $this->configFactory = $configFactory;
//  }
//
//  public static function create(ContainerInterface $container) {
//    return new static(
//      $container->get('config.factory')
//    );
//  }

  public function urlArgument($arg1){
    return [
      '#markup' => "this page has ".$arg1." value",
    ];
  }


  public function urlNodeArgument(NodeInterface $node){
    $output = render(\Drupal::entityTypeManager()->getViewBuilder('node')->view($node, 'teaser'));
    return[
      '#markup' => $output,
    ];

  }
  public function urlconfigArgument($config_name) {
    //kint($config_name);
    //kint($config_name['cancel_confirm']['body']);
    //$output = render(\Drupal::entityTypeManager()->getViewBuilder('node')->view($config_name, 'full'));
    return[
      '#markup' => $config_name['cancel_confirm']['body'],
    ];
  }
}
