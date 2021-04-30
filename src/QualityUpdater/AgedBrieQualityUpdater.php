<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

class AgedBrieQualityUpdater implements QualityUpdater
{
    public function updateQuality(Item $item): void
    {
        $item->sell_in--;

        if ($item->quality <= 50) {
            $item->quality++;
        }
    }
}