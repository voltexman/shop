<?php

namespace shop\repositories\other\contacts;

use shop\entities\other\contacts\Soc;
use shop\repositories\NotFoundException;

class SocRepository
{
    public function get($id): Soc
    {
        if (!$soc = Soc::findOne($id)) {
            throw new NotFoundException('Soc is not found.');
        }
        return $soc;
    }

    public function save(Soc $soc): void
    {
        if (!$soc->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Soc $soc): void
    {
        if (!$soc->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}