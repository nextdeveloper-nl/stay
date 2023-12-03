<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\Rooms;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class RoomsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractRoomsTransformer extends AbstractTransformer
{

    /**
     * @param Rooms $model
     *
     * @return array
     */
    public function transform(Rooms $model)
    {
                        $stayHotelsId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotels_id)->first();
                    $stayRoomTypeId = \NextDeveloper\Stay\Database\Models\RoomTypes::where('id', $model->stay_room_type_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'name'  =>  $model->name,
            'features'  =>  $model->features,
            'stay_hotels_id'  =>  $stayHotelsId ? $stayHotelsId->uuid : null,
            'stay_room_type_id'  =>  $stayRoomTypeId ? $stayRoomTypeId->uuid : null,
            'created_at'  =>  $model->created_at ? $model->created_at->toIso8601String() : null,
            'updated_at'  =>  $model->updated_at ? $model->updated_at->toIso8601String() : null,
            'deleted_at'  =>  $model->deleted_at ? $model->deleted_at->toIso8601String() : null,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n



}
