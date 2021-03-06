<?php

namespace Aimeos\MW\Filesystem;


class FlyDropboxTest extends \PHPUnit\Framework\TestCase
{
	protected function setUp()
	{
		if( !interface_exists( '\\League\\Flysystem\\FilesystemInterface' ) ) {
			$this->markTestSkipped( 'Install Flysystem first' );
		}
	}


	public function testGetProvider()
	{
		$object = new FlyDropbox( [] );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( 'Aimeos\MW\Filesystem\Exception' );
		$object->has( 'test' );
	}


	public function testGetProviderToken()
	{
		$config = array(
			'accesstoken' => 'test',
		);
		$object = new FlyDropbox( $config );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( 'Aimeos\MW\Filesystem\Exception' );
		$object->has( 'test' );
	}


	public function testGetProviderAccess()
	{
		if( !class_exists( '\League\Flysystem\Dropbox\DropboxAdapter' ) ) {
			$this->markTestSkipped( 'Install Flysystem Dropbox adapter' );
		}

		$config = array(
			'accesstoken' => 'test',
			'appsecret' => 'test',
		);
		$object = new FlyDropbox( $config );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( 'Exception' );
		$object->has( 'test' );
	}
}
