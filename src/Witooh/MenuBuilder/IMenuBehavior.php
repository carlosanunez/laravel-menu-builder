<?php
namespace Witooh\MenuBuilder;
use Witooh\TagBuilder\Facades\Tag;

interface IMenuBehavior {
    /**
     * @param array $config
     * @param integer $menuLevel
     * @return Tag
     */
    public static function makeLI($config, $menuLevel);

    /**
     * @param integer $menuLevel
     * @return Tag
     */
    public static function makeUL($menuLevel);
}