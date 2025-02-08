<?php

namespace NextDeveloper\Stay\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Stay\Database\Models\SalesContracts;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Stay\Http\Transformers\AbstractTransformers\AbstractSalesContractsTransformer;

/**
 * Class SalesContractsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class SalesContractsTransformer extends AbstractSalesContractsTransformer
{

    /**
     * @param SalesContracts $model
     *
     * @return array
     */
    public function transform(SalesContracts $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('SalesContracts', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('SalesContracts', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
