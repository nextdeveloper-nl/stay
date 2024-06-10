<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Hotels;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractHotelsTransformer;

/**
 * Class HotelsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class HotelsTransformer extends AbstractHotelsTransformer
{

    /**
     * @param Hotels $model
     *
     * @return array
     */
    public function transform(Hotels $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Hotels', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Hotels', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
