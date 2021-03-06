<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\ContentNegotiation\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\ContentNegotiation\ContentNegotiationOptions;

class ContentNegotiationOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = [];

        if ($serviceLocator->has('Config')) {
            $appConfig = $serviceLocator->get('Config');
            if (isset($appConfig['zf-content-negotiation'])
                && is_array($appConfig['zf-content-negotiation'])
            ) {
                $config = $appConfig['zf-content-negotiation'];
            }
        }

        return new ContentNegotiationOptions($config);
    }
}
