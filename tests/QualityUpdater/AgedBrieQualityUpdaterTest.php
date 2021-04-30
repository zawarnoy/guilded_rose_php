<?php

namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\AgedBrieQualityUpdater;
use PHPUnit\Framework\TestCase;

class AgedBrieQualityUpdaterTest extends TestCase
{

    /**
     * @dataProvider updateQualityDataProvider
     */
    public function testUpdateQuality($item, $expected): void
    {
        $itemUpdater = new AgedBrieQualityUpdater();
        $itemUpdater->updateQuality($item);
        $this->assertEquals($expected, $item);
    }

    public function updateQualityDataProvider(): array
    {
        return [
            [
                new Item('Item', -3, 1),
                new Item('Item', -4, 3),
            ],
            [
                new Item('Item', -3, 49),
                new Item('Item', -4, 50),
            ],
            [
                new Item('Item', -3, 5),
                new Item('Item', -4, 7),
            ],
            [
                new Item('Item', 10, 4),
                new Item('Item', 9, 5),
            ],
        ];
    }

}