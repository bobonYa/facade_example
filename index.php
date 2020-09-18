<?php
spl_autoload_register();
use Facade\Weather;

use \Parser\OpenWeather;

/*
 * Weather(city_name[default: Moscow],weather parser[default /Parser/OpenWeather])
 * getWeather
 * type: json(default)|xml
 * method: save(default)|show
 */
$weather=new Weather('34234234234234234',new OpenWeather());
$weather->getWeather('json','show');