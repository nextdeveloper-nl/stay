<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\CancellationPolicies;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractCancellationPoliciesTransformer;

/**
 * Class CancellationPoliciesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class CancellationPoliciesTransformer extends AbstractCancellationPoliciesTransformer
{

    /**
     * @param CancellationPolicies $model
     *
     * @return array
     */
    public function transform(CancellationPolicies $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('CancellationPolicies', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('CancellationPolicies', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
