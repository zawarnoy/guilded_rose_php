<?php

namespace GildedRose\QualityUpdater;


use GildedRose\Item;

class DefaultQualityUpdater implements QualityUpdater
{
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality === 0) {
            return;
        }

        if ($item->sell_in < 0) {
            $item->quality -= 2;
        } else {
            $item->quality--;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}