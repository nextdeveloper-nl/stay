<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Rates;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRatesTransformer;

/**
 * Class RatesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RatesTransformer extends AbstractRatesTransformer
{

    /**
     * @param Rates $model
     *
     * @return array
     */
    public function transform(Rates $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Rates', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Rates', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
