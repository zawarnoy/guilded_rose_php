<?php


namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\SulfurasQualityUpdater;
use PHPUnit\Framework\TestCase;

class SulfurasQualityUpdaterTest extends TestCase
{
    /**
     * @dataProvider updateQualityDataProvider
     */
    public function testUpdateQuality($item, $expected): void
    {
        $itemUpdater = new SulfurasQualityUpdater();
        $itemUpdater->updateQuality($item);
        $this->assertEquals($expected, $item);
    }

    public function updateQualityDataProvider(): array
    {
        return [
            [
                new Item('Item', -2, 80),
                new Item('Item', -2, 80),
            ],
            [
                new Item('Item', 14, 80),
                new Item('Item', 14, 80),
            ],
        ];
    }
}