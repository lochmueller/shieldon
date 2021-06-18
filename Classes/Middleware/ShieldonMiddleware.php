<?php

namespace HDNET\Shieldon\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Shieldon\Firewall\Captcha\Csrf;
use Shieldon\Firewall\Firewall;
use Shieldon\Firewall\HttpResolver;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 */
class ShieldonMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $firewall = new Firewall($request);
        $firewall->configure(GeneralUtility::getFileAbsFileName('EXT:shieldon/Configuration/'));
        // $firewall->controlPanel($this->panelUri);

        $firewall->getKernel()->setCaptcha(
            new Csrf([
                'name' => '_shieldon_csrf',
                'value' => $request->getAttribute('_shieldon_csrf'),
            ])
        );

        $response = $firewall->run();

        if ($response->getStatusCode() !== 200) {
            $httpResolver = new HttpResolver();
            $httpResolver($response);
        }

        return $handler->handle($request);
    }
}
