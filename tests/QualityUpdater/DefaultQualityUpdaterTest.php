<?php

namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\DefaultQualityUpdater;
use PHPUnit\Framework\TestCase;

class DefaultQualityUpdaterTest extends TestCase
{

    /**
     * @dataProvider updateQualityDataProvider
     */
    public function testUpdateQuality($item, $expected): void
    {
        $itemUpdater = new DefaultQualityUpdater();
        $itemUpdater->updateQuality($item);
        $this->assertEquals($expected, $item);
    }

    public function updateQualityDataProvider(): array
    {
        return [
            [
                new Item('Item', 0, 1),
                new Item('Item', -1, 0),
            ],
            [
                new Item('Item', -3, 1),
                new Item('Item', -4, 0),
            ],
            [
                new Item('Item', -3, 1),
                new Item('Item', -4, 0),
            ],
            [
                new Item('Item', -3, 5),
                new Item('Item', -4, 3),
            ],
            [
                new Item('Item', 10, 5),
                new Item('Item', 9, 4),
            ],
        ];
    }
}