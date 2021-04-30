<?php

namespace GildedRose\QualityUpdater;

use GildedRose\Item;

interface QualityUpdater
{
    public function updateQuality(Item $item): void;
}