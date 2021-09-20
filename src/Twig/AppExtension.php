<?php
/**
 * Created by PhpStorm.
 * User: mathermann
 * Date: 15/01/2020
 * Time: 14:07
 */

namespace App\Twig;


use Symfony\Bridge\Twig\AppVariable;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('truncate', [$this, 'truncate'])
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_url', [$this, 'getCurrentUrl'], ['needs_context' => true]),
            new TwigFunction('is_active', [$this, 'isRouteActive'], ['needs_context' => true]),
            new TwigFunction('die', 'die'),
        ];
    }

    public function truncate(?string $str, int $maxLength = 255): ?string
    {
        if (!$str || strlen($str) <= $maxLength)
            return $str;

        return substr($str, 0, $maxLength - 3) . '...';
    }

    public function getCurrentUrl(array $ctx): string
    {
        /**
         * @var AppVariable $app
         */
        $app = $ctx['app'];
        $req_attrs = $app->getRequest()->attributes;

        return $this->router->generate(
            $req_attrs->get('_route'),
            $req_attrs->get('_route_params'),
            UrlGeneratorInterface::ABSOLUTE_URL
        );
    }

    public function isRouteActive(array $ctx, $routes): string
    {
        /**
         * @var AppVariable $app
         */
        $app = $ctx['app'];

        if (!is_array($routes))
            $routes = [$routes];

        if (in_array($app->getRequest()->attributes->get('_route'), $routes))
            return "current-page active";

        return "";
    }
}
