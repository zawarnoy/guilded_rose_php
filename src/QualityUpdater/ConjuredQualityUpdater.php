<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

class ConjuredQualityUpdater implements QualityUpdater
{
    private const QUALITY_DECREASE = 2;
    private const QUALITY_DECREASE_AFTER_EXPIRE = 4;

    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality === self::MIN_QUALITY) {
            return;
        }

        if ($item->sell_in < 0) {
            $item->quality -= self::QUALITY_DECREASE_AFTER_EXPIRE;
        } else {
            $item->quality-= self::QUALITY_DECREASE;
        }

        if ($item->quality < self::MIN_QUALITY) {
            $item->quality = self::MIN_QUALITY;
        }
    }
}