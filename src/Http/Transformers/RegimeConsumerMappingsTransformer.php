<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\RegimeConsumerMappings;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRegimeConsumerMappingsTransformer;

/**
 * Class RegimeConsumerMappingsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RegimeConsumerMappingsTransformer extends AbstractRegimeConsumerMappingsTransformer
{

    /**
     * @param RegimeConsumerMappings $model
     *
     * @return array
     */
    public function transform(RegimeConsumerMappings $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('RegimeConsumerMappings', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('RegimeConsumerMappings', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
