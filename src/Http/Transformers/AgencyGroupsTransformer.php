<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\AgencyGroups;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractAgencyGroupsTransformer;

/**
 * Class AgencyGroupsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AgencyGroupsTransformer extends AbstractAgencyGroupsTransformer
{

    /**
     * @param AgencyGroups $model
     *
     * @return array
     */
    public function transform(AgencyGroups $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('AgencyGroups', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('AgencyGroups', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
