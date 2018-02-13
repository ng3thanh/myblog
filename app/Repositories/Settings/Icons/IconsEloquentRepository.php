<?php
namespace App\Repositories\Settings\Icons;

use App\Models\Setting\Icons;
use App\Repositories\EloquentRepository;

class IconsEloquentRepository extends EloquentRepository implements IconsRepositoryInterface
{

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return Icons::class;
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getIconsByType($type) {
        return Icons::where('type', $type)->get();
    }
}