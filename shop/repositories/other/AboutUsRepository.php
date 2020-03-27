<?php

namespace shop\repositories\other;

use shop\entities\other\AboutUs;
use shop\repositories\NotFoundException;

class AboutUsRepository
{
    public function get($id): AboutUs
    {
        if (!$aboutUs = AboutUs::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $aboutUs;
    }


    public function save(AboutUs $aboutUs): void
    {
        if (!$aboutUs->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(AboutUs $aboutUs): void
    {
        if (!$aboutUs->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}