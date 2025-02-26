<?php

namespace NextDeveloper\Stay\Http\Transformers\AbstractTransformers;

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
use NextDeveloper\Stay\Database\Models\HotelSupplements;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class HotelSupplementsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Stay\Http\Transformers
 */
class AbstractHotelSupplementsTransformer extends AbstractTransformer
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
     * @param HotelSupplements $model
     *
     * @return array
     */
    public function transform(HotelSupplements $model)
    {
                                                $stayHotelSupplementTypeId = \NextDeveloper\Stay\Database\Models\HotelSupplementTypes::where('id', $model->stay_hotel_supplement_type_id)->first();
                                                            $stayProviderId = \NextDeveloper\Stay\Database\Models\Providers::where('id', $model->stay_provider_id)->first();
                                                            $stayProductGroupId = \NextDeveloper\Stay\Database\Models\ProductGroups::where('id', $model->stay_product_group_id)->first();
                                                            $staySaleContractId = \NextDeveloper\Stay\Database\Models\SaleContracts::where('id', $model->stay_sale_contract_id)->first();
                                                            $stayRateId = \NextDeveloper\Stay\Database\Models\Rates::where('id', $model->stay_rate_id)->first();
                                                            $stayHotelSupplementClassId = \NextDeveloper\Stay\Database\Models\HotelSupplementClasses::where('id', $model->stay_hotel_supplement_class_id)->first();
                                                            $parentStayHotelSupplementId = \NextDeveloper\\Database\Models\ParentStayHotelSupplements::where('id', $model->parent_stay_hotel_supplement_id)->first();
                                                            $baseRegimeId = \NextDeveloper\\Database\Models\BaseRegimes::where('id', $model->base_regime_id)->first();
                                                            $baseRoomTypeId = \NextDeveloper\\Database\Models\BaseRoomTypes::where('id', $model->base_room_type_id)->first();
                                                            $stayOfferSupplementTypeId = \NextDeveloper\Stay\Database\Models\OfferSupplementTypes::where('id', $model->stay_offer_supplement_type_id)->first();
                                                            $baseSupplementTypeId = \NextDeveloper\\Database\Models\BaseSupplementTypes::where('id', $model->base_supplement_type_id)->first();
                                                            $regimeChangeFromId = \NextDeveloper\\Database\Models\RegimeChangeFroms::where('id', $model->regime_change_from_id)->first();
                                                            $regimeChangeToId = \NextDeveloper\\Database\Models\RegimeChangeTos::where('id', $model->regime_change_to_id)->first();
                                                            $roomUpgradeFromId = \NextDeveloper\\Database\Models\RoomUpgradeFroms::where('id', $model->room_upgrade_from_id)->first();
                                                            $roomUpgradeToId = \NextDeveloper\\Database\Models\RoomUpgradeTos::where('id', $model->room_upgrade_to_id)->first();
                                                            $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                                                            $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
                        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'stay_hotel_supplement_type_id'  =>  $stayHotelSupplementTypeId ? $stayHotelSupplementTypeId->uuid : null,
            'start_date'  =>  $model->start_date,
            'end_date'  =>  $model->end_date,
            'is_active'  =>  $model->is_active,
            'is_searcher'  =>  $model->is_searcher,
            'is_total'  =>  $model->is_total,
            'is_on_request'  =>  $model->is_on_request,
            'quantity'  =>  $model->quantity,
            'is_percentage'  =>  $model->is_percentage,
            'value'  =>  $model->value,
            'information'  =>  $model->information,
            'show_in_bonus'  =>  $model->show_in_bonus,
            'apply_entry_day'  =>  $model->apply_entry_day,
            'stay_provider_id'  =>  $stayProviderId ? $stayProviderId->uuid : null,
            'stay_product_group_id'  =>  $stayProductGroupId ? $stayProductGroupId->uuid : null,
            'stay_sale_contract_id'  =>  $staySaleContractId ? $staySaleContractId->uuid : null,
            'price_guarantee'  =>  $model->price_guarantee,
            'cost_price_guarantee'  =>  $model->cost_price_guarantee,
            'stay_rate_id'  =>  $stayRateId ? $stayRateId->uuid : null,
            'payment_date'  =>  $model->payment_date,
            'payment_percentage'  =>  $model->payment_percentage,
            'is_early_booking'  =>  $model->is_early_booking,
            'price_type'  =>  $model->price_type,
            'is_discount'  =>  $model->is_discount,
            'creation_date'  =>  $model->creation_date,
            'collection_date'  =>  $model->collection_date,
            'is_direct_payment'  =>  $model->is_direct_payment,
            'stay_hotel_supplement_class_id'  =>  $stayHotelSupplementClassId ? $stayHotelSupplementClassId->uuid : null,
            'parent_stay_hotel_supplement_id'  =>  $parentStayHotelSupplementId ? $parentStayHotelSupplementId->uuid : null,
            'is_associated_contract'  =>  $model->is_associated_contract,
            'promo_text'  =>  $model->promo_text,
            'base_regime_id'  =>  $baseRegimeId ? $baseRegimeId->uuid : null,
            'base_room_type_id'  =>  $baseRoomTypeId ? $baseRoomTypeId->uuid : null,
            'stay_offer_supplement_type_id'  =>  $stayOfferSupplementTypeId ? $stayOfferSupplementTypeId->uuid : null,
            'has_associated_quota'  =>  $model->has_associated_quota,
            'is_special_regime'  =>  $model->is_special_regime,
            'reservation_start_date'  =>  $model->reservation_start_date,
            'reservation_end_date'  =>  $model->reservation_end_date,
            'is_migrated'  =>  $model->is_migrated,
            'is_by_season'  =>  $model->is_by_season,
            'season_quote'  =>  $model->season_quote,
            'currency'  =>  $model->currency,
            'shift_days'  =>  $model->shift_days,
            'show_in_voucher'  =>  $model->show_in_voucher,
            'created_by_hotel'  =>  $model->created_by_hotel,
            'is_sent'  =>  $model->is_sent,
            'is_rate'  =>  $model->is_rate,
            'fixed_payment_amount'  =>  $model->fixed_payment_amount,
            'fixed_sale_payment_amount'  =>  $model->fixed_sale_payment_amount,
            'is_promo_text_mandatory'  =>  $model->is_promo_text_mandatory,
            'round_sale'  =>  $model->round_sale,
            'is_version_disabled'  =>  $model->is_version_disabled,
            'is_versionable'  =>  $model->is_versionable,
            'included_extranet_contracts'  =>  $model->included_extranet_contracts,
            'is_per_pax'  =>  $model->is_per_pax,
            'is_early_settled'  =>  $model->is_early_settled,
            'is_historic'  =>  $model->is_historic,
            'priority'  =>  $model->priority,
            'adult_export_code'  =>  $model->adult_export_code,
            'child_export_code'  =>  $model->child_export_code,
            'is_migrated_information'  =>  $model->is_migrated_information,
            'base_supplement_type_id'  =>  $baseSupplementTypeId ? $baseSupplementTypeId->uuid : null,
            'is_extranet'  =>  $model->is_extranet,
            'apply_special_markup'  =>  $model->apply_special_markup,
            'is_packaged'  =>  $model->is_packaged,
            'supplement_application'  =>  $model->supplement_application,
            'supplement_type'  =>  $model->supplement_type,
            'is_mandatory'  =>  $model->is_mandatory,
            'is_fair_rate'  =>  $model->is_fair_rate,
            'is_whole_stay'  =>  $model->is_whole_stay,
            'is_not_whole_stay'  =>  $model->is_not_whole_stay,
            'duration_applies_to_reservation'  =>  $model->duration_applies_to_reservation,
            'apply_default_additionals'  =>  $model->apply_default_additionals,
            'apply_default_children'  =>  $model->apply_default_children,
            'entry_weekdays'  =>  $model->entry_weekdays,
            'apply_exit_weekdays'  =>  $model->apply_exit_weekdays,
            'apply_weekdays'  =>  $model->apply_weekdays,
            'min_reservation_days'  =>  $model->min_reservation_days,
            'max_reservation_days'  =>  $model->max_reservation_days,
            'min_advance_days'  =>  $model->min_advance_days,
            'max_advance_days'  =>  $model->max_advance_days,
            'generic_type'  =>  $model->generic_type,
            'has_baby_occupancy'  =>  $model->has_baby_occupancy,
            'child_range_from_a'  =>  $model->child_range_from_a,
            'child_range_to_a'  =>  $model->child_range_to_a,
            'child_range_to_b'  =>  $model->child_range_to_b,
            'free_additional1'  =>  $model->free_additional1,
            'free_additional2'  =>  $model->free_additional2,
            'free_additional_more'  =>  $model->free_additional_more,
            'free_child_a1'  =>  $model->free_child_a1,
            'free_child_a2'  =>  $model->free_child_a2,
            'free_child_a_more'  =>  $model->free_child_a_more,
            'free_child_b1'  =>  $model->free_child_b1,
            'free_child_b2'  =>  $model->free_child_b2,
            'free_child_b_more'  =>  $model->free_child_b_more,
            'regime_change_from_id'  =>  $regimeChangeFromId ? $regimeChangeFromId->uuid : null,
            'regime_change_to_id'  =>  $regimeChangeToId ? $regimeChangeToId->uuid : null,
            'room_upgrade_from_id'  =>  $roomUpgradeFromId ? $roomUpgradeFromId->uuid : null,
            'room_upgrade_to_id'  =>  $roomUpgradeToId ? $roomUpgradeToId->uuid : null,
            'free_nights_per_each'  =>  $model->free_nights_per_each,
            'free_nights_number'  =>  $model->free_nights_number,
            'free_nights_type'  =>  $model->free_nights_type,
            'free_nights_only_once'  =>  $model->free_nights_only_once,
            'is_non_refundable'  =>  $model->is_non_refundable,
            'minimum_age'  =>  $model->minimum_age,
            'has_shifted_dates'  =>  $model->has_shifted_dates,
            'is_whole_stay_price'  =>  $model->is_whole_stay_price,
            'price_types'  =>  $model->price_types,
            'applies_only_stay_duration'  =>  $model->applies_only_stay_duration,
            'service_duration'  =>  $model->service_duration,
            'min_pax'  =>  $model->min_pax,
            'max_pax'  =>  $model->max_pax,
            'provider_commission'  =>  $model->provider_commission,
            'client_commissionable'  =>  $model->client_commissionable,
            'multiple_stay_days'  =>  $model->multiple_stay_days,
            'access_control_group'  =>  $model->access_control_group,
            'resident_application'  =>  $model->resident_application,
            'external_code'  =>  $model->external_code,
            'external_id'  =>  $model->external_id,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    public function includeStates(HotelSupplements $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(HotelSupplements $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(HotelSupplements $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(HotelSupplements $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(HotelSupplements $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(HotelSupplements $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(HotelSupplements $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(HotelSupplements $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(HotelSupplements $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE








}
