<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

class QualityUpdaterFactory
{
    public static function createForItem(Item $item): QualityUpdater
    {
        switch ($item->name) {
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfurasQualityUpdater();
            case 'Conjured Mana Cake':
                return new ConjuredQualityUpdater();
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassesQualityUpdater();
            case 'Aged Brie':
                return new AgedBrieQualityUpdater();
            default:
                return new DefaultQualityUpdater();
        }
    }
}