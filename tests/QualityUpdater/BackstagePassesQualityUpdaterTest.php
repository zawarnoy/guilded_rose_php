<?php

namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\BackstagePassesQualityUpdater;
use PHPUnit\Framework\TestCase;

class BackstagePassesQualityUpdaterTest extends TestCase
{

    /**
     * @dataProvider updateQualityDataProvider
     */
    public function testUpdateQuality($item, $expected): void
    {
        $itemUpdater = new BackstagePassesQualityUpdater();
        $itemUpdater->updateQuality($item);
        $this->assertEquals($expected, $item);
    }

    public function updateQualityDataProvider(): array
    {
        return [
            [
                new Item('Item', 11, 3),
                new Item('Item', 10, 4),
            ],
            [
                new Item('Item', 10, 1),
                new Item('Item', 9, 3),
            ],
            [
                new Item('Item', 4, 5),
                new Item('Item', 3, 8),
            ],
            [
                new Item('Item', -1, 5),
                new Item('Item', -2, 0),
            ],
            [
                new Item('Item', 13, 50),
                new Item('Item', 12, 50),
            ],
        ];
    }
}