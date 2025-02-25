<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\ProductTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractProductTypesTransformer;

/**
 * Class ProductTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class ProductTypesTransformer extends AbstractProductTypesTransformer
{

    /**
     * @param ProductTypes $model
     *
     * @return array
     */
    public function transform(ProductTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('ProductTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('ProductTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
