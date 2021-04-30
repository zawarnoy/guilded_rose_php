<?php

namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\ConjuredQualityUpdater;
use PHPUnit\Framework\TestCase;

class ConjuredQualityUpdaterTest extends TestCase
{
    /**
     * @dataProvider updateQualityDataProvider
     */
    public function testUpdateQuality($item, $expected): void
    {
        $itemUpdater = new ConjuredQualityUpdater();
        $itemUpdater->updateQuality($item);
        $this->assertEquals($expected, $item);
    }

    public function updateQualityDataProvider(): array
    {
        return [
            [
                new Item('Item', 11, 3),
                new Item('Item', 10, 1),
            ],
            [
                new Item('Item', 10, 1),
                new Item('Item', 9, 0),
            ],
            [
                new Item('Item', -1, 5),
                new Item('Item', -2, 1),
            ],
        ];
    }
}