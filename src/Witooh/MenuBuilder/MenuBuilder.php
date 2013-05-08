<?php
namespace Witooh\MenuBuilder;

class MenuBuilder
{
    private $behavior = 'Witooh\MenuBuilder\Menu';

    protected function generate($configs, $ul, $menuLevel)
    {
        foreach ($configs as $config) {
            $li = call_user_func(array($this->behavior, "makeLI"), $config, $menuLevel);
            if ($li != false) {
                if (isset($config['menu']) && is_array($config['menu'])) {
                    $menuLevel++;
                    $ulSubMenu = call_user_func(array($this->behavior, "makeUL"), $menuLevel);
                    $li->innerHtml(static::generate($config['menu'], $ulSubMenu, $menuLevel));
                    $ul->innerHtml($li);
                } else {
                    $ul->innerHtml($li);
                }
            }
        }

        return $ul;
    }

    public function make(array $configs)
    {
        $ul = call_user_func(array($this->behavior, "makeUL"), 0);
        $ul = static::generate($configs, $ul, 0);
        echo $ul->toString();
    }

    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;
    }

}