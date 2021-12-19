<h1 align="center">Menvel-Setting-Profile</h1>

Menvel-Setting-Profile is a setting profile helper for Lumen and Laravel.

Getting Started
---

Installation :

```
$ composer require hsbmaulana/menvel-setting-profile
```

How to use it :

- Put `Menvel\SettingProfile\SettingProfileServiceProvider` to service provider configuration list.

- Migrate.

```
$ php artisan migrate
```

- Sample usage.

```php
use Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository;

$repository = app(ISettingProfileRepository::class);
// $repository->setUser(...); //
// $repository->getUser(); //

// $repository->setPhoto('...'); //
// $repository->setBackground('...'); //
// $repository->setHeaderground('...'); //
// $repository->setFooterground('...'); //
// $repository->all(); //
```

Author
---

- Hasby Maulana ([@hsbmaulana](https://linkedin.com/in/hsbmaulana))
