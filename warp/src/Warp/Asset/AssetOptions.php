<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

namespace Warp\Asset;

/**
 * Asset options class, provides options implementation.
 */
abstract class AssetOptions implements \ArrayAccess
{
    /**
     * @var array
     */
    protected $options;

    /**
     * Constructor.
     *
     * @param array $options
     */
    public function __construct($options = array())
    {
        $this->options = $options;
    }

    /**
     * Get options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /* ArrayAccess interface implementation */

    public function offsetSet(mixed $name, mixed $value): void
    {
        if ($name === null) {
            $this->options[] = $value;
        } else {
            $this->options[$name] = $value;
        }
    }

    public function offsetGet(mixed $name): mixed
    {
        return array_key_exists($name, $this->options) ? $this->options[$name] : null;
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->options);
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->options[$offset]);
    }
}
