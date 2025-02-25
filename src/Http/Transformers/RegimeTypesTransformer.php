<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RegimeTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRegimeTypesTransformer;

/**
 * Class RegimeTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RegimeTypesTransformer extends AbstractRegimeTypesTransformer
{

    /**
     * @param RegimeTypes $model
     *
     * @return array
     */
    public function transform(RegimeTypes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RegimeTypes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RegimeTypes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
