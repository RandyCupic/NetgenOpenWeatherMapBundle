Netgen OpenWeatherMap Bundle installation instructions
======================================================

Requirements
------------

* eZ Platform 1.0+
* eZ Publish 5

Installation steps
------------------

### Use Composer

Run the following from your website root folder to install Netgen OpenWeatherMap Bundle:

```
$ composer require netgen/open-weather-map-bundle
```

### Activate the bundle

Activate the bundle in `app/AppKernel.php` file by adding it to the `$bundles` array in `registerBundles` method:

```php
public function registerBundles()
{
    ...

    $bundles[] = new Netgen\Bundle\OpenWeatherMapBundle\NetgenTagsBundle();

    return $bundles;
}
```

### Edit configuration

Put the following in your `app/config/routing.yml` file to be able to display tag view pages:

```yml
_netgen_open_weather_map:
    resource: "@NetgenOpenWeatherMapBundle/Resources/config/routing.yml"
    prefix:   /
```

### Set siteaccess aware configuration

Configure parameters related to OpenWeatherMap API in `app/config/config.yml` or `app/config/ezplatform.yml`:

```yml
netgen_open_weather_map:
   system:
       default:
           api_settings:
               api_key: 'YOUR API KEY HERE'
               units: 'metric' # metric or imperial
               language: 'en' # Please check http://openweathermap.org/ for this one
               type: 'accurate' # like or accurate
           cache_settings:
               handler: 'stash' # stash, memcached or null
               ttl: 3600
           memcached_settings: # if memcached is used, please set memcached settings
               server: localhost
               port: 11211
```

### Clear the caches

Clear the eZ Publish caches with the following command:

```bash
$ php app/console cache:clear
```
