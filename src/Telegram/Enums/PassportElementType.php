<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum PassportElementType: string
{
    case PASSPORT = 'passport';
    case DRIVER_LICENSE = 'driver_license';
    case IDENTITY_CARD = 'identity_card';
    case INTERNAL_PASSPORT = 'internal_passport';
    case UTILITY_BILL = 'utility_bill';
    case BANK_STATEMENT = 'bank_statement';
    case RENTAL_AGREEMENT = 'rental_agreement';
    case PASSPORT_REGISTRATION = 'passport_registration';
    case TEMPORARY_REGISTRATION = 'temporary_registration';
}