<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\CancellationPolicyDates;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractCancellationPolicyDatesTransformer;

/**
 * Class CancellationPolicyDatesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class CancellationPolicyDatesTransformer extends AbstractCancellationPolicyDatesTransformer
{

    /**
     * @param CancellationPolicyDates $model
     *
     * @return array
     */
    public function transform(CancellationPolicyDates $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('CancellationPolicyDates', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('CancellationPolicyDates', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
