<?php

namespace Faker\Provider\en_AE;

class Address extends \Faker\Provider\Address
{
    protected static $streetNameFormats = array(
        '{{bldNamePrefix}} {{bldNameSuffix}}',
        '{{bldNamePrefix}} {{bldNameSuffix}} %',
        '{{bldNamePrefix}}',
        '{{bldNamePrefix}} %',
    );
    protected static $streetAddressFormats = array(
        '{{streetName}}, {{city}}',
    );
    protected static $addressFormats = array(
        '{{buildingName}} {{apartmentNumber}}, {{city}}',
        '{{buildingName}} {{secondaryAddress}}, {{city}}'
    );
    protected static $apartmentNumberFormats = array(
        '%%##', '#%-##', 'G-##', '%-##',
    );
    protected static $emirates = array(
        'Dubai', 'Abu Dhabi', 'Ajman', 'Fujairah', 'Ras al-Khaimah', 'Sharjah', 'Umm al-Quwain'
    );
    protected static $country = array(
        'United Arab Emirates',
    );
    protected static $city = array(
        'Abu Dhabi', 'Al Ain', 'Ajman', 'Dubai', 'Fujairah', 'Ras al-Khaimah', 'Sharjah', 'Khor Fakkan', 'Dibba Al-Hisn', 'Umm al-Quwain',
    );
    protected static $bldNameSuffix = array(
        'Tower', 'View',
    );
    protected static $bldNamePrefix = array(
        'Marina', 'Jumeirah', 'Burj', 'Dreams', 'Emirates', 'Siena', 'Noora', 'Springs', 'Meadows', 'Maydan', 'DSC', 'Lake',
    );
    protected static $secondaryAddressFormats = array('Apt. ###', 'Suite ###', 'Villa #%');

    public function emirate()
    {
        return static::randomElement(static::$emirates);
    }

    public function city()
    {
        return static::randomElement(static::$city);
    }

    public function secondaryAddress()
    {
        return static::numerify(static::randomElement(static::$secondaryAddressFormats));
    }

    public function state()
    {
        return static::randomElement(static::$emirates);
    }

    public function apartmentNumber()
    {
        return static::numerify(static::randomElement(static::$apartmentNumberFormats));
    }

    public function buildingName()
    {
        return $this->streetName();
    }

    public function bldNameSuffix()
    {
        return static::randomElement(static::$bldNameSuffix);
    }

    public function bldNamePrefix()
    {
        return static::randomElement(static::$bldNamePrefix);
    }

    public function streetName()
    {
        return static::numerify(parent::streetName());
    }
}
