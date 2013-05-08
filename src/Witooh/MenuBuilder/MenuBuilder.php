<?php
namespace Witooh\MenuBuilder;

class MenuBuilder
{

    protected static function generate($menuBehavior, $configs, $ul, $menuLevel)
    {
        foreach ($configs as $config) {
            $li = call_user_func(array($menuBehavior, "makeLI"), $config, $menuLevel);
            if ($li != false) {
                if (isset($config['menu']) && is_array($config['menu'])) {
                    $menuLevel++;
                    $ulSubMenu = call_user_func(array($menuBehavior, "makeUL"), $menuLevel);
                    $li->innerHtml(static::generate($menuBehavior, $config['menu'], $ulSubMenu, $menuLevel));
                    $ul->innerHtml($li);
                } else {
                    $ul->innerHtml($li);
                }
            }
        }

        return $ul;
    }

    public static function make(array $configs, $menuBehavior = 'Witooh\MenuBuilder\Menu')
    {
        $ul = call_user_func(array($menuBehavior, "makeUL"), 0);
        $ul = static::generate($menuBehavior, $configs, $ul, 0);
        echo $ul->toString();
    }
}