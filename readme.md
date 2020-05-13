## Laravel Migration Paths
By [matt127127](https://github.com/matt127127/laravel-migration-paths)

During the periodical development phase the migrations folder may become very large. 
It is very helpful if we can organize the content of the migration folders.
This library helps to organize migration files in different folders.

### Installation:
Use [Composer](https://getcomposer.org/) to install the library.
```bash
composer require matt127127/laravel-migration-paths
```

After updating composer, add the service provider to the `providers` array in `config/app.php`
```php
matt127127\MigrationPath\ServiceProvider::class,
```

**Laravel 5.5** uses Package Auto-Discovery, so does not require you to manually add the ServiceProvider.

### Usage:
By default all folders under the `database/migrations` directory will be registered for migrations.

But, if you would like to add multiple directories which are not under the migrations folder,
you have to publish the config first.

```php
php artisan vendor:publish --provider="matt127127\MigrationPath\ServiceProvider" --tag="config"
```

Add your custom directories:
```php
'paths' => [
    database_path('migrations'),
    'path/to/custom_migrations', // Your Custom Migration Directory
],
```

### License
This bundle is under the MIT license. For the full copyright and license
information please view the LICENSE file that was distributed with this source code.