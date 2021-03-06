<?php

namespace Lupcom\Globals;

use Lupcom\Globals\Dca\Config\Item as ConfigItem;
use Lupcom\Globals\Dca\Fields\Item as FieldItem;
use Lupcom\Globals\Dca\Lists\Item as ListItem;
use Lupcom\Globals\Dca\Palettes\Item as PalettesItem;
use Lupcom\Globals\Dca\Palettes\Subpalette;

/**
 * Class Dca
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Dca
{
    /**
     * @var
     */
    public static $instance;
    /**
     * @var
     */
    public static $namespace;

    /**
     * Dca constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $namespace
     * @return Dca
     */
    public static function new($namespace)
    {
        self::$instance  = new self;
        self::$namespace = $namespace;

        return self::$instance;
    }

    /**
     * @param false $extend
     * @return ConfigItem
     * @throws Exceptions\DcaConfigNotSetException
     */
    public function config($extend = false): ConfigItem
    {
        return new ConfigItem(static::$namespace, $extend);
    }

    /**
     * @param false $extend
     * @return ListItem
     * @throws Exceptions\DcaListNotSetException
     */
    public function list($extend = false): ListItem
    {
        return new ListItem(static::$namespace, $extend);
    }

    /**
     * @param $field
     * @param false $extend
     * @return FieldItem
     * @throws Exceptions\DcaFieldExistsException
     * @throws Exceptions\DcaFieldNotSetException
     */
    public function fields($field, $extend = false): FieldItem
    {
        return new FieldItem(static::$namespace, $field, $extend);
    }

    /**
     * @param $element
     * @return PalettesItem
     */
    public function palettes($element): PalettesItem
    {
        return new PalettesItem(static::$namespace, $element);
    }

    /**
     * @param $element
     * @return Subpalette
     */
    public function subpalette($element)
    {
        return new Subpalette(static::$namespace, $element);
    }
}