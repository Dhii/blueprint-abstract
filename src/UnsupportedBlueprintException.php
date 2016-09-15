<?php

namespace Dhii\Blueprint;

/**
 * An exception thrown when a builder does not support a given blueprint.
 *
 * @author Miguel Muscat <miguelmuscat93@gmail.com>
 */
class UnsupportedBlueprintException extends \Exception implements UnsupportedBlueprintExceptionInterface
{

    /**
     * @var BlueprintInterface
     */
    protected $blueprint;

    /**
     * @var BuilderInterface
     */
    protected $builder;

    /**
     * {@inheritdoc}
     *
     * @param BuilderInterface $builder [optional] The builder interface. Default: null
     * @param BlueprintInterface $blueprint [optional] The blueprint interface. Default: null
    */
    public function __construct($message = "", $code = 0, \Exception $previous = null, BuilderInterface $builder = null, BlueprintInterface $blueprint = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setBuilder($builder)
            ->setBlueprint($blueprint);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlueprint()
    {
        return $this->blueprint;
    }

    /**
     * {@inheritdoc}
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * Sets the unsupported blueprint instance.
     *
     * @param BlueprintInterface $blueprint The blueprint instance.
     * @return UnsupportedBlueprintException This instance.
     */
    public function setBlueprint($blueprint)
    {
        $this->blueprint = $blueprint;
        return $this;
    }

    /**
     * Sets the builder instance that threw this exception.
     *
     * @param BuilderInterface $builder The builder instance.
     * @return UnsupportedBlueprintException This instance.
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
        return $this;
    }

}
