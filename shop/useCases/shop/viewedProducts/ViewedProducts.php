<?php

namespace shop\useCases\shop\viewedProducts;

use shop\components\storage\StorageInterface;

class ViewedProducts
{
    private $storage;
    private $maxCount = 10;
    /**
     * @var ViewedProduct[]
     * */
    private $items;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return ViewedProduct[]
     */
    public function getItems(): array
    {
        $this->loadItems();
        return array_reverse($this->items);
    }

    public function getAmount(): int
    {
        $this->loadItems();
        return count($this->items);
    }

    public function add(ViewedProduct $item): void
    {
        $this->loadItems();

        foreach ($this->items as $i => $current) {
            if ($current->getId() == $item->getId()) {
                return;
            }
        }

        if ($this->getAmount() >= $this->maxCount){
            array_pop($this->items);
        }

        $this->items[] = $item;
        $this->saveItems();
    }

//    public function set($id, $quantity): void
//    {
//        $this->loadItems();
//        foreach ($this->items as $i => $current) {
//            if ($current->getId() == $id) {
//                $this->items[$i] = $current->changeQuantity($quantity);
//                $this->saveItems();
//                return;
//            }
//        }
//        throw new \DomainException('Item is not found.');
//    }

//    public function remove($id): void
//    {
//        $this->loadItems();
//        foreach ($this->items as $i => $current) {
//            if ($current->getId() == $id) {
//                unset($this->items[$i]);
//                $this->saveItems();
//                return;
//            }
//        }
//        throw new \DomainException('Item is not found.');
//    }

    public function clear(): void
    {
        $this->items = [];
        $this->saveItems();
    }


    private function loadItems(): void
    {
        if ($this->items === null) {
            $this->items = $this->storage->load();
        }
    }

    private function saveItems(): void
    {
        $this->storage->save($this->items);
    }
} 