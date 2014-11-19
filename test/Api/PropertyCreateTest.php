<?php
 
use MyAllocator\phpsdk\Api\PropertyCreate;
use MyAllocator\phpsdk\Object\Auth;
use MyAllocator\phpsdk\Util\Common;
 
class PropertyCreateTest extends PHPUnit_Framework_TestCase
{
    /**
     * @author nathanhelenihi
     * @group api
     */
    public function testClass()
    {
        $obj = new PropertyCreate();
        $this->assertEquals('MyAllocator\phpsdk\Api\PropertyCreate', get_class($obj));
    }

    public function fixtureAuthCfgObject()
    {
        $auth = Common::get_auth_env(array(
            'vendorId',
            'vendorPassword',
            'userId',
            'userPassword'
        ));
        $data = array();
        $data[] = array($auth);

        return $data;
    }

    /**
     * @author nathanhelenihi
     * @group api
     * @dataProvider fixtureAuthCfgObject
     */
    public function testCreate(array $fxt)
    {
        if (!$fxt['from_env']) {
            $this->markTestSkipped('Environment credentials not set.');
        }

        $obj = new PropertyCreate($fxt);

        if (!$obj->isEnabled()) {
            $this->markTestSkipped('API is disabled!');
        }

        // No user id / password should fail
        $caught = false;
        try {
            $rsp = $obj->create(array(
                'PropertyName' => 'PHP SDK Hotel A',
                'ExpiryDate' => '2020-01-01',
                'Currency' => 'USD',
                'Country' => 'US',
                'Breakfast' => 'EX'
            ));
            var_dump($rsp);
        } catch (exception $e) {
            $caught = true;
            $this->assertInstanceOf('MyAllocator\phpsdk\Exception\ApiException', $e);
        }

        if (!$caught) {
            $this->fail('should have thrown an exception');
        }

        /*
         * Successful calls require special vendor permissions.

        // Successful call
        $rsp = $obj->create(array(
            'UserId' => 'phpsdk_property_A',
            'UserPassword' => 'password', // update to real password
            'PropertyName' => 'PHP SDK Hotel A',
            'ExpiryDate' => '2020-01-01',
            'Currency' => 'USD',
            'Country' => 'US',
            'Breakfast' => 'EX'
        ));

        var_dump($rsp);
        $this->assertTrue(isset($rsp['Success']));
        $this->assertEquals($rsp['Success'][0], 'true');

        */
    }
}