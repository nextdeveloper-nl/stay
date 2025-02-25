<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\Delegations;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractDelegationsTransformer;

/**
 * Class DelegationsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class DelegationsTransformer extends AbstractDelegationsTransformer
{

    /**
     * @param Delegations $model
     *
     * @return array
     */
    public function transform(Delegations $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Delegations', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Delegations', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
