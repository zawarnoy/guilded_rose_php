<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testDefaultItemUpdate(): void
    {
        $items = [new Item('Item', 0, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->quality);
    }

    public function testSeveralItemsUpdate(): void
    {
        $items = [
            new Item('Conjured Mana Cake', 3, 10),
            new Item('Sulfuras, Hand of Ragnaros', 23, 80),
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(8, $items[0]->quality);
        $this->assertSame(80, $items[1]->quality);
    }

}
