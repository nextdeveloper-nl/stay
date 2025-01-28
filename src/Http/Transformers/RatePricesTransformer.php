<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RatePrices;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRatePricesTransformer;

/**
 * Class RatePricesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RatePricesTransformer extends AbstractRatePricesTransformer
{

    /**
     * @param RatePrices $model
     *
     * @return array
     */
    public function transform(RatePrices $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RatePrices', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RatePrices', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
