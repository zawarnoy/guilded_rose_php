<?php

namespace Tests\QualityUpdater;

use GildedRose\Item;
use GildedRose\QualityUpdater\AgedBrieQualityUpdater;
use GildedRose\QualityUpdater\BackstagePassesQualityUpdater;
use GildedRose\QualityUpdater\ConjuredQualityUpdater;
use GildedRose\QualityUpdater\DefaultQualityUpdater;
use GildedRose\QualityUpdater\QualityUpdaterFactory;
use GildedRose\QualityUpdater\SulfurasQualityUpdater;
use PHPUnit\Framework\TestCase;

class QualityUpdaterFactoryTest extends TestCase
{
    public function testCreateForItem(): void
    {
        $item = new Item('Default item', 3,3);
        $this->assertTrue(QualityUpdaterFactory::createForItem($item) instanceof DefaultQualityUpdater);


        $item = new Item('Aged Brie', 3,3);
        $this->assertTrue(QualityUpdaterFactory::createForItem($item) instanceof AgedBrieQualityUpdater);


        $item = new Item('Sulfuras, Hand of Ragnaros', 3,80);
        $this->assertTrue(QualityUpdaterFactory::createForItem($item) instanceof SulfurasQualityUpdater);


        $item = new Item('Conjured Mana Cake', 3,3);
        $this->assertTrue(QualityUpdaterFactory::createForItem($item) instanceof ConjuredQualityUpdater);


        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 3,3);
        $this->assertTrue(QualityUpdaterFactory::createForItem($item) instanceof BackstagePassesQualityUpdater);
    }
}