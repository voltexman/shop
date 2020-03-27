<?php

namespace shop\repositories\other;


use shop\entities\other\Guarantee;
use shop\repositories\NotFoundException;

class GuaranteeRepository
{
    public function get($id): Guarantee
    {
        if (!$guarantee = Guarantee::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $guarantee;
    }


    public function save(Guarantee $guarantee): void
    {
        if (!$guarantee->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Guarantee $guarantee): void
    {
        if (!$guarantee->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}