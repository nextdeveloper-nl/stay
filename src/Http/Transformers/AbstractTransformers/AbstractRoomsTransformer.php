<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

use NextDeveloper\Stay\Database\Models\Rooms;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Commons\Database\Models\Addresses;
use NextDeveloper\Commons\Database\Models\Comments;
use NextDeveloper\Commons\Database\Models\Meta;
use NextDeveloper\Commons\Database\Models\PhoneNumbers;
use NextDeveloper\Commons\Database\Models\SocialMedia;
use NextDeveloper\Commons\Database\Models\Votes;
use NextDeveloper\Commons\Database\Models\Media;
use NextDeveloper\Commons\Http\Transformers\MediaTransformer;
use NextDeveloper\Commons\Database\Models\AvailableActions;
use NextDeveloper\Commons\Http\Transformers\AvailableActionsTransformer;
use NextDeveloper\Commons\Database\Models\States;
use NextDeveloper\Commons\Http\Transformers\StatesTransformer;
use NextDeveloper\Commons\Http\Transformers\CommentsTransformer;
use NextDeveloper\Commons\Http\Transformers\SocialMediaTransformer;
use NextDeveloper\Commons\Http\Transformers\MetaTransformer;
use NextDeveloper\Commons\Http\Transformers\VotesTransformer;
use NextDeveloper\Commons\Http\Transformers\AddressesTransformer;
use NextDeveloper\Commons\Http\Transformers\PhoneNumbersTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class RoomsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractRoomsTransformer extends AbstractTransformer
{

    /**
     * @var array
     */
    protected array $availableIncludes = [
        'states',
        'actions',
        'media',
        'comments',
        'votes',
        'socialMedia',
        'phoneNumbers',
        'addresses',
        'meta'
    ];

    /**
     * @param Rooms $model
     *
     * @return array
     */
    public function transform(Rooms $model)
    {
                                                $stayHotelId = \NextDeveloper\Stay\Database\Models\Hotels::where('id', $model->stay_hotel_id)->first();
                                                            $stayRoomTypeId = \NextDeveloper\Stay\Database\Models\RoomTypes::where('id', $model->stay_room_type_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'stay_hotel_id'  =>  $stayHotelId ? $stayHotelId->uuid : null,
            'stay_room_type_id'  =>  $stayRoomTypeId ? $stayRoomTypeId->uuid : null,
            'price'  =>  $model->price,
            'extra_adult_price'  =>  $model->extra_adult_price,
            'display_order'  =>  $model->display_order,
            'external_code'  =>  $model->external_code,
            'minimum_price'  =>  $model->minimum_price,
            'maximum_price'  =>  $model->maximum_price,
            'min_child_age'  =>  $model->min_child_age,
            'is_non_refundable'  =>  $model->is_non_refundable,
            'room_size'  =>  $model->room_size,
            'room_size_unit'  =>  $model->room_size_unit,
            'max_infants'  =>  $model->max_infants,
            'original_name'  =>  $model->original_name,
            'is_active'  =>  $model->is_active,
            'is_hidden_in_allotment'  =>  $model->is_hidden_in_allotment,
            'child_can_be_priced_as_adult'  =>  $model->child_can_be_priced_as_adult,
            'infant_priced_as_child'  =>  $model->infant_priced_as_child,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(Rooms $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(Rooms $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(Rooms $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(Rooms $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(Rooms $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(Rooms $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(Rooms $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(Rooms $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(Rooms $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n












































}
