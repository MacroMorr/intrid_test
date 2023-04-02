<?php

namespace app\services;

use app\repository\SizeRepository;

class SizeService
{
    public function getAllFromStore(): array
    {
        return SizeRepository::getAllInStore();
    }
}