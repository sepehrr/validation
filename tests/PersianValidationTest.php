<?php

use Anetwork\Validation\PersianValidation as PersianValidation;

/**
 * unit test class
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since May 28, 2016
 */
class PersianValidationTest extends PHPUnit_Framework_TestCase
{
    //variables of class
    protected $attribute;
    protected $value;
    protected $parameters;
    protected $validator;
    protected $PersianValidation;

    public function __construct() {

      $this->PersianValidation = new PersianValidation();
    }

    /**
     * unit test of persian alphabet
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha() {

      $this->value = "Shahrokh";

      $this->assertEquals( false,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "شاهرخ";

      $this->assertEquals( true,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "1111شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha( $this->attribute, $this->value, $this->parameters, $this->validator ) );


    }

    /**
     * unit test of persian number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testNum() {

      $this->value = "1234";

      $this->assertEquals( false,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "۱۲۳۴";

      $this->assertEquals( true,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "۱۲۳123";

      $this->assertEquals( false,  $this->PersianValidation->num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of persian alphabet and number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testAlpha_Num() {

      $this->value = "Shahrokh1234";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "1111شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "1111شاهرخ۱۲۳۴";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "شاهرخ";

      $this->assertEquals( true,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "۱۲۳۴";

      $this->assertEquals( true,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value =  "Shahrokh۱۲۳۴شاهرخ";

      $this->assertEquals( false,  $this->PersianValidation->alpha_num( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of mobile number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testMobile() {

      $this->value = "+989380105725";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09380105725";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "989123583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "9380105725";

      $this->assertEquals( false,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09023583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "09313583439";

      $this->assertEquals( true,  $this->PersianValidation->mobile( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of sheba number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testSheba() {

      $this->value = "IR062960000000100324200001";

      $this->assertEquals( true,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "IR06296000000010032420000";

      $this->assertEquals( false,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "00062960000000100324200001";

      $this->assertEquals( false,  $this->PersianValidation->sheba( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of melliCode number
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since May 28, 2016
     * @return void
     */
    public function testMelliCode() {

      $this->value = "3240175800";

      $this->assertEquals( true,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "324011122";

      $this->assertEquals( false,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = "3213213";

      $this->assertEquals( false,  $this->PersianValidation->melliCode( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of geo
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 11, 2016
     * @return void
     */
    public function testGeo() {

      $this->value = [ "1352", "1353", "1354" ];

      $this->assertEquals( true,  $this->PersianValidation->geo( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "1300" ];

      $this->assertEquals( false,  $this->PersianValidation->geo( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "1352", "1353", "1354", "1383" ];

      $this->assertEquals( false,  $this->PersianValidation->geo( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of os
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 11, 2016
     * @return void
     */
    public function testOs() {

      $this->value = [ "21", "22", "23", "24", "25" ];

      $this->assertEquals( true,  $this->PersianValidation->os( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "22", "23", "24", "25", "30" ];

      $this->assertEquals( false,  $this->PersianValidation->os( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "11", "12", "13", "21", "22", "23", "24", "25", "26", "27", "28", "29" ];

      $this->assertEquals( true,  $this->PersianValidation->os( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "11", "12", "13", "21", "22", "23", "24", "25", "26", "27", "28", "29", "20" ];

      $this->assertEquals( false,  $this->PersianValidation->os( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of category
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 11, 2016
     * @return void
     */
    public function testCategory() {

      $this->value = [ "1", "23", "25", "26" ];

      $this->assertEquals( true,  $this->PersianValidation->category( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "23", "25", "26", "27" ];

      $this->assertEquals( false,  $this->PersianValidation->category( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "1", "2", "5", "16", "17", "18", "19", "21", "23", "25", "26" ];

      $this->assertEquals( true,  $this->PersianValidation->category( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "1", "2", "5", "16", "4", "17", "18", "19", "21", "23", "25", "26" ];

      $this->assertEquals( false,  $this->PersianValidation->category( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of category range
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 8, 2016
     * @return void
     */
    public function testCategoryRange() {

      $this->value = [ "16", "23" ];

      $this->assertEquals( true,  $this->PersianValidation->category_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [];

      $this->assertEquals( false,  $this->PersianValidation->category_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "16", "23", "25" ];

      $this->assertEquals( false,  $this->PersianValidation->category_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of geo range
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 8, 2016
     * @return void
     */
    public function testGeoRange() {

      $this->value = [ "21", "22", "23", "24", "25" ];

      $this->assertEquals( true,  $this->PersianValidation->geo_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [];

      $this->assertEquals( false,  $this->PersianValidation->geo_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "21", "22", "23", "24", "25", "26" ];

      $this->assertEquals( false,  $this->PersianValidation->geo_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

    /**
     * unit test of os range
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since June 8, 2016
     * @return void
     */
    public function testOsRange() {

      $this->value = [ "21", "22", "23", "24", "25", "26" ];

      $this->assertEquals( true,  $this->PersianValidation->os_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [];

      $this->assertEquals( false,  $this->PersianValidation->os_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

      $this->value = [ "21", "22", "23", "24", "25", "26", "27" ];

      $this->assertEquals( false,  $this->PersianValidation->os_range( $this->attribute, $this->value, $this->parameters, $this->validator ) );

    }

}
