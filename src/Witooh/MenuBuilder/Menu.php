<?php
namespace Witooh\MenuBuilder;

use Witooh\TagBuilder\Facades\Tag;

class Menu implements IMenu
{

    public static function makeUL($menuLevel)
    {
        if ($menuLevel == 0) {
            return Tag::make('ul');
        } else {
            return Tag::make('ul')->attr('class', 'submenu');
        }
    }

    public static function makeLI($config, $menuLevel)
    {
        if (isset($config['visible']) && $config['visible'] == false) {
            return false;
        }

        $li = Tag::make('li');
        $a  = Tag::make('a');

        if (isset($config['link'])) {
            $a->attr('href', $config['link']);
        } else {
            $a->attr('href', "javascript:;");
        }

        if (isset($config['icon'])) {
            $icon = Tag::make('i');
            $icon->attr('class', $config['icon']);
            $a->innerHtml($icon);
        }

        if (isset($config['title'])) {
            $title = Tag::make('span');
            $title->attr('class', 'title');
            $title->innerHtml($config['title']);
            $a->innerHtml($title);
        }

        $li->innerHtml($a);

        return $li;
    }
}