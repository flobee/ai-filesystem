<?php

namespace Aimeos\MW\Filesystem;


class FlyGridfsTest extends \PHPUnit_Framework_TestCase
{
	public function testGetProvider()
	{
		$object = new FlyGridfs( array() );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( 'Aimeos\MW\Filesystem\Exception' );
		$object->has( 'test' );
	}


	public function testGetProviderToken()
	{
		if( !class_exists( '\League\Flysystem\GridFS\GridFSAdapter' ) ) {
			$this->markTestSkipped( 'Install Flysystem GridFS adapter' );
		}

		if( !class_exists( '\MongoClient' ) ) {
			$this->markTestSkipped( 'Install Mongo client extension' );
		}

		$config = array(
			'dbname' => 'test',
		);
		$object = new FlyGridfs( $config );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( 'Aimeos\MW\Filesystem\Exception' );
		$object->has( 'test' );
	}
}
