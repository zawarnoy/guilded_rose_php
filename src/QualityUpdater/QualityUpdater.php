<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

interface QualityUpdater
{
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    public function updateQuality(Item $item): void;
}