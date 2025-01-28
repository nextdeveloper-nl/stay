<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Consumers;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractConsumersTransformer;

/**
 * Class ConsumersTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class ConsumersTransformer extends AbstractConsumersTransformer
{

    /**
     * @param Consumers $model
     *
     * @return array
     */
    public function transform(Consumers $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Consumers', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Consumers', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
