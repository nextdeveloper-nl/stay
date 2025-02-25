<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\ProductGroups;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractProductGroupsTransformer;

/**
 * Class ProductGroupsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class ProductGroupsTransformer extends AbstractProductGroupsTransformer
{

    /**
     * @param ProductGroups $model
     *
     * @return array
     */
    public function transform(ProductGroups $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('ProductGroups', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('ProductGroups', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
