<?php

namespace GildedRose\QualityUpdater;


use GildedRose\Item;

class DefaultQualityUpdater implements QualityUpdater
{
    protected const QUALITY_DECREASE = 1;
    protected const QUALITY_DECREASE_AFTER_EXPIRE = 2;

    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality === self::MIN_QUALITY) {
            return;
        }

        if ($item->sell_in < 0) {
            $item->quality -= static::QUALITY_DECREASE_AFTER_EXPIRE;
        } else {
            $item->quality -= static::QUALITY_DECREASE;
        }

        if ($item->quality < self::MIN_QUALITY) {
            $item->quality = self::MIN_QUALITY;
        }
    }
}