<h1>Laravel Menu Builder</h1>

<h2>Install</h2>

Add this into config/app.php

```php
'providers' => array(
    ...
    ...
    'Witooh\MenuBuilder\MenuBuilderServiceProvider',
),
```

and

```php
'aliases' => array(
    ...
    ...
    'MenuBuilder' => 'Witooh\MenuBuilder\Facades\MenuBuilder',
),
```
<h2>Usage</h2>

Implement IMenuBahvior

```php
namespace MyMenu;
class MenuBehavior implements IMenuBehavior
{
	public static function makeUL($menuLevel){
		return Tag::make('ul');
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
```

Set the behavior to MenuBuilder

```php
MenuBuilder::setBehavior('MyMenu\MenuBehavior');
```

Display the menu in blade

```php
	MenuBuilder::make(array(
        array(
            'title'=>'Home 1',
            'icon'=>'icon-home',
            'menu'=>array(
                array(
                    'title'=>'Sub Home 1',
                    'icon'=>'icon-home',
                    'link'=>'#',
                    'menu'=>array(
                        array(
                            'title'=>'Sub Sub Home 1',
                            'icon'=>'icon-home',
                            'link'=>'#',
                        )
                    )
                )
            ),
        ),
        array(
            'title'=>'Home 2',
            'icon'=>'icon-home',
            'link'=>'#',
            'menu'=>array(
                array(
                    'title'=>'Sub Home 2',
                    'icon'=>'icon-home',
                    'link'=>'#',
                )
            )
        )
    ));
```
