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
