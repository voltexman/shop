<?php

namespace shop\readModels\other;


use shop\entities\other\OurService;

class OurServiceReadRepository
{

    /**
     * @return OurService
     */
    public function getOurService(): OurService
    {
        return OurService::findOne(1);
    }






}