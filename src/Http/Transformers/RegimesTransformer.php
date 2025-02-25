<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Regimes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractRegimesTransformer;

/**
 * Class RegimesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class RegimesTransformer extends AbstractRegimesTransformer
{

    /**
     * @param Regimes $model
     *
     * @return array
     */
    public function transform(Regimes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Regimes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Regimes', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
