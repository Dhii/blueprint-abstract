<?php

namespace Dhii\Blueprint;

/**
 * Abstract implementation of {@see BuilderInterface}.
 *
 * @author Miguel Muscat <miguelmuscat93@gmail.com>
 */
abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     *
     * @throws UnsupportedBlueprintException If this builder does not support the given blueprint instance.
     */
    public function build(BlueprintInterface $blueprint)
    {
        if (!$this->supports($blueprint)) {
            $message = sprintf('Builder "%s" does not support blueprints of type "%s".', get_called_class(), get_class($blueprint));
            throw new UnsupportedBlueprintException($message, 1, null, $this, $blueprint);
        }

        return $this->_build($blueprint);
    }

    /**
     * Internal build method, invoked after the builder checks for blueprint support.
     */
    abstract protected function _build(BlueprintInterface $blueprint);
}
