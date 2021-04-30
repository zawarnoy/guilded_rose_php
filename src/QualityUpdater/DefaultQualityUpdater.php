<?php

namespace GildedRose\QualityUpdater;


use GildedRose\Item;

class DefaultQualityUpdater implements QualityUpdater
{
    private const QUALITY_DECREASE = 1;
    private const QUALITY_DECREASE_AFTER_EXPIRY = 2;

    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality === self::MIN_QUALITY) {
            return;
        }

        if ($item->sell_in < 0) {
            $item->quality -= self::QUALITY_DECREASE_AFTER_EXPIRY;
        } else {
            $item->quality -= self::QUALITY_DECREASE;
        }

        if ($item->quality < self::MIN_QUALITY) {
            $item->quality = self::MIN_QUALITY;
        }
    }
}