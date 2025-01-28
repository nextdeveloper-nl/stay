<?php

namespace NextDeveloper\Stay\Http\Requests\Rooms;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotel_id' => 'required|exists:stay_hotels,uuid|uuid',
        'stay_room_type_id' => 'required|exists:stay_room_types,uuid|uuid',
        'price' => 'nullable',
        'extra_adult_price' => 'nullable',
        'display_order' => 'nullable|integer',
        'external_code' => 'nullable',
        'minimum_price' => 'nullable',
        'maximum_price' => 'nullable',
        'min_child_age' => 'nullable|integer',
        'is_non_refundable' => 'nullable|boolean',
        'room_size' => 'nullable',
        'room_size_unit' => 'nullable',
        'max_infants' => 'nullable|integer',
        'original_name' => 'nullable',
        'is_active' => 'boolean',
        'is_hidden_in_allotment' => 'nullable|boolean',
        'child_can_be_priced_as_adult' => 'nullable|boolean',
        'infant_priced_as_child' => 'nullable|boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}