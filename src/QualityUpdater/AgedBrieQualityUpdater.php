<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

class AgedBrieQualityUpdater implements QualityUpdater
{
    private const QUALITY_INCREASE_AFTER_EXPIRY = 2;
    private const QUALITY_INCREASE = 1;

    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality === self::MAX_QUALITY) {
            return;
        }

        $increase = $item->sell_in < 0 ? self::QUALITY_INCREASE_AFTER_EXPIRY : self::QUALITY_INCREASE;
        $item->quality += $increase;

        if ($item->quality > self::MAX_QUALITY) {
            $item->quality = self::MAX_QUALITY;
        }
    }
}