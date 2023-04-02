<?php

namespace app\services;

use app\repository\ColorRepository;

class ColorService
{
    public function getAllFromStore(): array
    {
        return ColorRepository::getAllInStore();
    }
}