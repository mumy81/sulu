<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Component\Content\Form\Type;

use Sulu\Component\Content\Form\DataTransformer\DocumentToUuidTransformer;
use Sulu\Component\DocumentManager\DocumentManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form type which represents a Sulu Document.
 */
class DocumentObjectType extends AbstractType
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function configureOptions(OptionsResolver $options)
    {
        $options->setDefault('compound', false);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addViewTransformer(new DocumentToUuidTransformer($this->documentManager));
    }
}
