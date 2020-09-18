<?php
spl_autoload_register();
use Facade\Weather;

use \Parser\OpenWeather;

/*
 * Weather(city_name[default: Moscow],weather parser[default /Parser/OpenWeather])
 * getWeather
 * type: json(default)|xml
 * method: save(default)|show
 *
 * явно указываем какой парсер погоды использовать
 * $weather=new Weather('Nosovibirsk',new OpenWeather());
 */

$weather=new Weather('Nosovibirsk');
$weather->getWeather('xml','save');

echo "done()";