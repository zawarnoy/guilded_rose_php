<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

class BackstagePassesQualityUpdater implements QualityUpdater
{
    private const QUALITY_INCREASE_10_5_DAYS = 2;
    private const QUALITY_INCREASE_4_0_DAYS = 3;
    private const QUALITY_DEFAULT_INCREASE = 1;

    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->sell_in < 0) {
            $item->quality = self::MIN_QUALITY;
            return;
        }

        if ($item->sell_in < 10) {
            $increase = $item->sell_in >= 5 ? self::QUALITY_INCREASE_10_5_DAYS : self::QUALITY_INCREASE_4_0_DAYS;
            $item->quality += $increase;
        } else {
            $item->quality += self::QUALITY_DEFAULT_INCREASE;
        }

        if ($item->quality > self::MAX_QUALITY) {
            $item->quality = self::MAX_QUALITY;
        }
    }
}