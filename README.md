Simple Query interface for https://ipinfodb.com/ for Laravel 5
==

How to install:
=
Install Package
```php
composer require tiran133/ipinfodb-php
```

Publish Config
```php
php artisan vender:publish --provider="Tiran133\Laravel\IPInfoDBServiceProvider"
```
Add your api key to .env
```
IPINFODB_API_KEY=<Your IP Key>
```
How to use:
=
Via Facade:

Country:

```php
$country = \Tiran133\Laravel\Facade\IPInfo::getCountry($ip);
 
$country->countryName;
$country->countryCode;
```

City:
```php
$city = \Tiran133\Laravel\Facade\IPInfo::getCity($ip);
 
$city->countryName;
$city->countryCode;
$city->regionName;
$city->cityName;
$city->zipCode;
$city->latitude;
$city->longitude;
$city->timeZone;

```

Via app()

Country:
```php
$ipinfo =  app('ipinfodb');
$country = $ipinfo->getCountry($ip);     
 
$country->countryName;
$country->countryCode;

```

City:
```php
$city = \Tiran133\Laravel\Facade\IPInfo::getCity($ip);
 
$city->countryName;
$city->countryCode;
$city->regionName;
$city->cityName;
$city->zipCode;
$city->latitude;
$city->longitude;
$city->timeZone;
```