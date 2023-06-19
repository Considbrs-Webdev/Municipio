<?php

namespace Municipio\Controller\Purpose;

/**
 * The PurposeFactory Class
 *
 * This class is a basic implementation of the 'PurposeComponentInterface' interface. It provides
 * default methods and properties for a purpose. Designed to be a base class for all
 * purpose classes in the project.
 *
 * A simple purpose class that doesn't need to manage/load other purposes should extend
 * this class to gain basic functionalities. An example of a simple purpose is 'Place'.
 *
 * A complex purpose is a class that needs to manage/load other purposes and it should extend
 * this class and also implement the 'PurposeCollectionInterface' interface. An example of a complex
 * purpose is 'Event',
 */
class PurposeFactory implements PurposeComponentInterface
{
    protected string $key;
    protected string $label;
    protected string $view;

    public function __construct(string $key, string $label)
    {
        $this->key              = $key;
        $this->label            = $label;
        $this->view             = "purpose-{$key}";
    }
    /**
     * This method is empty by default and can be overridden by subclasses
     * to add their own initialization logic.
     */
    public function init(): void
    {
    }
    public function getLabel(): string
    {
        return $this->label;
    }
    public function getKey(): string
    {
        return $this->key;
    }
    public function getView(): string
    {
        return $this->view;
    }
}
