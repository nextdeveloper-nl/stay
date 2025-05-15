<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                                                                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class HotelSupplementsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function value($value)
    {
        return $this->builder->where('value', 'like', '%' . $value . '%');
    }
    
    public function information($value)
    {
        return $this->builder->where('information', 'like', '%' . $value . '%');
    }
    
    public function promoText($value)
    {
        return $this->builder->where('promo_text', 'like', '%' . $value . '%');
    }
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }

    public function priceGuarantee($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('price_guarantee', $operator, $value);
    }

    public function costPriceGuarantee($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('cost_price_guarantee', $operator, $value);
    }

    public function shiftDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('shift_days', $operator, $value);
    }

    public function priority($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('priority', $operator, $value);
    }

    public function minReservationDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('min_reservation_days', $operator, $value);
    }

    public function maxReservationDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_reservation_days', $operator, $value);
    }

    public function minAdvanceDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('min_advance_days', $operator, $value);
    }

    public function maxAdvanceDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_advance_days', $operator, $value);
    }

    public function childRangeFromA($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('child_range_from_a', $operator, $value);
    }

    public function childRangeToA($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('child_range_to_a', $operator, $value);
    }

    public function childRangeToB($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('child_range_to_b', $operator, $value);
    }

    public function freeNightsPerEach($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('free_nights_per_each', $operator, $value);
    }

    public function freeNightsNumber($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('free_nights_number', $operator, $value);
    }

    public function minimumAge($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('minimum_age', $operator, $value);
    }

    public function serviceDuration($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('service_duration', $operator, $value);
    }

    public function minPax($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('min_pax', $operator, $value);
    }

    public function maxPax($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_pax', $operator, $value);
    }

    public function multipleStayDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('multiple_stay_days', $operator, $value);
    }

    public function accessControlGroup($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('access_control_group', $operator, $value);
    }

    public function residentApplication($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('resident_application', $operator, $value);
    }

    public function isActive($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_active', $value);
    }

    public function isSearcher($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_searcher', $value);
    }

    public function isTotal($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_total', $value);
    }

    public function isOnRequest($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_on_request', $value);
    }

    public function isPercentage($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_percentage', $value);
    }

    public function isEarlyBooking($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_early_booking', $value);
    }

    public function isDiscount($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_discount', $value);
    }

    public function isDirectPayment($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_direct_payment', $value);
    }

    public function isAssociatedContract($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_associated_contract', $value);
    }

    public function isSpecialRegime($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_special_regime', $value);
    }

    public function isMigrated($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_migrated', $value);
    }

    public function isBySeason($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_by_season', $value);
    }

    public function isSent($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_sent', $value);
    }

    public function isRate($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_rate', $value);
    }

    public function isPromoTextMandatory($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_promo_text_mandatory', $value);
    }

    public function isVersionDisabled($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_version_disabled', $value);
    }

    public function isVersionable($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_versionable', $value);
    }

    public function isPerPax($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_per_pax', $value);
    }

    public function isEarlySettled($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_early_settled', $value);
    }

    public function isHistoric($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_historic', $value);
    }

    public function isMigratedInformation($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_migrated_information', $value);
    }

    public function isExtranet($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_extranet', $value);
    }

    public function isPackaged($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_packaged', $value);
    }

    public function isMandatory($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_mandatory', $value);
    }

    public function isFairRate($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_fair_rate', $value);
    }

    public function isWholeStay($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_whole_stay', $value);
    }

    public function isNotWholeStay($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_not_whole_stay', $value);
    }

    public function isNonRefundable($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_non_refundable', $value);
    }

    public function isWholeStayPrice($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_whole_stay_price', $value);
    }

    public function startDateStart($date)
    {
        return $this->builder->where('start_date', '>=', $date);
    }

    public function startDateEnd($date)
    {
        return $this->builder->where('start_date', '<=', $date);
    }

    public function endDateStart($date)
    {
        return $this->builder->where('end_date', '>=', $date);
    }

    public function endDateEnd($date)
    {
        return $this->builder->where('end_date', '<=', $date);
    }

    public function paymentDateStart($date)
    {
        return $this->builder->where('payment_date', '>=', $date);
    }

    public function paymentDateEnd($date)
    {
        return $this->builder->where('payment_date', '<=', $date);
    }

    public function creationDateStart($date)
    {
        return $this->builder->where('creation_date', '>=', $date);
    }

    public function creationDateEnd($date)
    {
        return $this->builder->where('creation_date', '<=', $date);
    }

    public function collectionDateStart($date)
    {
        return $this->builder->where('collection_date', '>=', $date);
    }

    public function collectionDateEnd($date)
    {
        return $this->builder->where('collection_date', '<=', $date);
    }

    public function reservationStartDateStart($date)
    {
        return $this->builder->where('reservation_start_date', '>=', $date);
    }

    public function reservationStartDateEnd($date)
    {
        return $this->builder->where('reservation_start_date', '<=', $date);
    }

    public function reservationEndDateStart($date)
    {
        return $this->builder->where('reservation_end_date', '>=', $date);
    }

    public function reservationEndDateEnd($date)
    {
        return $this->builder->where('reservation_end_date', '<=', $date);
    }

    public function createdAtStart($date)
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdAtEnd($date)
    {
        return $this->builder->where('created_at', '<=', $date);
    }

    public function updatedAtStart($date)
    {
        return $this->builder->where('updated_at', '>=', $date);
    }

    public function updatedAtEnd($date)
    {
        return $this->builder->where('updated_at', '<=', $date);
    }

    public function deletedAtStart($date)
    {
        return $this->builder->where('deleted_at', '>=', $date);
    }

    public function deletedAtEnd($date)
    {
        return $this->builder->where('deleted_at', '<=', $date);
    }

    public function stayHotelSupplementTypeId($value)
    {
            $stayHotelSupplementType = \NextDeveloper\Stay\Database\Models\HotelSupplementTypes::where('uuid', $value)->first();

        if($stayHotelSupplementType) {
            return $this->builder->where('stay_hotel_supplement_type_id', '=', $stayHotelSupplementType->id);
        }
    }

    public function stayProviderId($value)
    {
            $stayProvider = \NextDeveloper\Stay\Database\Models\Providers::where('uuid', $value)->first();

        if($stayProvider) {
            return $this->builder->where('stay_provider_id', '=', $stayProvider->id);
        }
    }

    public function stayProductGroupId($value)
    {
            $stayProductGroup = \NextDeveloper\Stay\Database\Models\ProductGroups::where('uuid', $value)->first();

        if($stayProductGroup) {
            return $this->builder->where('stay_product_group_id', '=', $stayProductGroup->id);
        }
    }

    public function staySaleContractId($value)
    {
            $staySaleContract = \NextDeveloper\Stay\Database\Models\SaleContracts::where('uuid', $value)->first();

        if($staySaleContract) {
            return $this->builder->where('stay_sale_contract_id', '=', $staySaleContract->id);
        }
    }

    public function stayRateId($value)
    {
            $stayRate = \NextDeveloper\Stay\Database\Models\Rates::where('uuid', $value)->first();

        if($stayRate) {
            return $this->builder->where('stay_rate_id', '=', $stayRate->id);
        }
    }

    public function stayHotelSupplementClassId($value)
    {
            $stayHotelSupplementClass = \NextDeveloper\Stay\Database\Models\HotelSupplementClasses::where('uuid', $value)->first();

        if($stayHotelSupplementClass) {
            return $this->builder->where('stay_hotel_supplement_class_id', '=', $stayHotelSupplementClass->id);
        }
    }

    public function parentStayHotelSupplementId($value)
    {
            $parentStayHotelSupplement = \NextDeveloper\\Database\Models\ParentStayHotelSupplements::where('uuid', $value)->first();

        if($parentStayHotelSupplement) {
            return $this->builder->where('parent_stay_hotel_supplement_id', '=', $parentStayHotelSupplement->id);
        }
    }

    public function baseRegimeId($value)
    {
            $baseRegime = \NextDeveloper\\Database\Models\BaseRegimes::where('uuid', $value)->first();

        if($baseRegime) {
            return $this->builder->where('base_regime_id', '=', $baseRegime->id);
        }
    }

    public function baseRoomTypeId($value)
    {
            $baseRoomType = \NextDeveloper\\Database\Models\BaseRoomTypes::where('uuid', $value)->first();

        if($baseRoomType) {
            return $this->builder->where('base_room_type_id', '=', $baseRoomType->id);
        }
    }

    public function stayOfferSupplementTypeId($value)
    {
            $stayOfferSupplementType = \NextDeveloper\Stay\Database\Models\OfferSupplementTypes::where('uuid', $value)->first();

        if($stayOfferSupplementType) {
            return $this->builder->where('stay_offer_supplement_type_id', '=', $stayOfferSupplementType->id);
        }
    }

    public function baseSupplementTypeId($value)
    {
            $baseSupplementType = \NextDeveloper\\Database\Models\BaseSupplementTypes::where('uuid', $value)->first();

        if($baseSupplementType) {
            return $this->builder->where('base_supplement_type_id', '=', $baseSupplementType->id);
        }
    }

    public function regimeChangeFromId($value)
    {
            $regimeChangeFrom = \NextDeveloper\\Database\Models\RegimeChangeFroms::where('uuid', $value)->first();

        if($regimeChangeFrom) {
            return $this->builder->where('regime_change_from_id', '=', $regimeChangeFrom->id);
        }
    }

    public function regimeChangeToId($value)
    {
            $regimeChangeTo = \NextDeveloper\\Database\Models\RegimeChangeTos::where('uuid', $value)->first();

        if($regimeChangeTo) {
            return $this->builder->where('regime_change_to_id', '=', $regimeChangeTo->id);
        }
    }

    public function roomUpgradeFromId($value)
    {
            $roomUpgradeFrom = \NextDeveloper\\Database\Models\RoomUpgradeFroms::where('uuid', $value)->first();

        if($roomUpgradeFrom) {
            return $this->builder->where('room_upgrade_from_id', '=', $roomUpgradeFrom->id);
        }
    }

    public function roomUpgradeToId($value)
    {
            $roomUpgradeTo = \NextDeveloper\\Database\Models\RoomUpgradeTos::where('uuid', $value)->first();

        if($roomUpgradeTo) {
            return $this->builder->where('room_upgrade_to_id', '=', $roomUpgradeTo->id);
        }
    }

    public function iamAccountId($value)
    {
            $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE









}
