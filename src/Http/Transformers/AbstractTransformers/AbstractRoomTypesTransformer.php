<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\RoomTypes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class RoomTypesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractRoomTypesTransformer extends AbstractTransformer
{

    /**
     * @param RoomTypes $model
     *
     * @return array
     */
    public function transform(RoomTypes $model)
    {
                        $stayHotelsId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotels_id)->first();
                    $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'stay_hotels_id'  =>  $stayHotelsId ? $stayHotelsId->uuid : null,
            'name'  =>  $model->name,
            'description'  =>  $model->description,
            'facilities'  =>  $model->facilities,
            'price'  =>  $model->price,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
















}
