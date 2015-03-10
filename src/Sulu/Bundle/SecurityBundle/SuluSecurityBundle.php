<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\SecurityBundle;

use Sulu\Bundle\SecurityBundle\DependencyInjection\Compiler\AddContentNavigationPass;
use Sulu\Bundle\SecurityBundle\DependencyInjection\Compiler\CurrentUserDataCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SuluSecurityBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CurrentUserDataCompilerPass());
        $container->addCompilerPass(new AddContentNavigationPass());
    }
}
