<?php

declare(strict_types=1);

namespace GildedRose;


use GildedRose\QualityUpdater\QualityUpdaterFactory;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $qualityUpdater = QualityUpdaterFactory::createForItem($item);
            $qualityUpdater->updateQuality($item);
        }
    }
}
