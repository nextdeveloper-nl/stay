<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\Reservations;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class ReservationsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractReservationsTransformer extends AbstractTransformer
{

    /**
     * @param Reservations $model
     *
     * @return array
     */
    public function transform(Reservations $model)
    {
                        $stayHotelsId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotels_id)->first();
                    $stayRoomId = \NextDeveloper\Stay\Database\Models\Rooms::where('id', $model->stay_room_id)->first();
                    $stayRoomTypeId = \NextDeveloper\Stay\Database\Models\RoomTypes::where('id', $model->stay_room_type_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'stay_hotels_id'  =>  $stayHotelsId ? $stayHotelsId->uuid : null,
            'stay_room_id'  =>  $stayRoomId ? $stayRoomId->uuid : null,
            'stay_room_type_id'  =>  $stayRoomTypeId ? $stayRoomTypeId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'reservation_date'  =>  $model->reservation_date,
            'reservation_data'  =>  $model->reservation_data,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
















}
