<?php

namespace Netgen\Bundle\OpenWeatherMapBundle\Core;

use Netgen\Bundle\OpenWeatherMapBundle\API\OpenWeatherMap\Weather\UltravioletIndexInterface;

/**
 * Class UltravioletIndex
 * @package Netgen\Bundle\OpenWeatherMapBundle\Core
 */
class UltravioletIndex extends Base implements UltravioletIndexInterface
{
    /**
     * @inheritDoc
     */
    public function fetchUltraviletIndex($latitude, $longitude, $datetime = 'current')
    {
        if ($datetime instanceof \DateTime) {
            $datetime = $datetime->format('c');
        } else {
            $datetime = 'current';
        }

        $queryPart = '/uvi/' . $latitude . ',' . $longitude . '/' . $datetime . '.json?appid=' . $this->apiKey;

        return $this->getResult(self::BASE_URL, $queryPart);
    }
}
