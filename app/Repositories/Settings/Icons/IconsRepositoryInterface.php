<?php
namespace App\Repositories\Settings\Icons;

interface IconsRepositoryInterface
{

    /**
     * @param $type
     * @return mixed
     */
    public function getIconsByType($type);
}