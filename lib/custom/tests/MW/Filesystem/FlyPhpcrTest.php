<?php

namespace Aimeos\MW\Filesystem;


class FlyPhpcrTest extends \PHPUnit_Framework_TestCase
{
	public function testGetProvider()
	{
		$object = new FlyPhpcr( array() );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( '\Aimeos\MW\Filesystem\Exception' );
		$object->has( 'test' );
	}


	public function testGetProviderRoot()
	{
		if( !class_exists( '\League\Flysystem\Phpcr\PhpcrAdapter' ) ) {
			$this->markTestSkipped( 'Install Flysystem PHPCR adapter' );
		}

		$config = array(
			'driver' => 'pdo_sqlite',
			'path' => '/tmp/fly_phpcr.db',
			'root' => '/',
		);
		$object = new FlyPhpcr( $config );
		$this->assertInstanceof( '\Aimeos\MW\Filesystem\Iface', $object );

		$this->setExpectedException( '\PHPCR\RepositoryException' );
		$object->has( 'test' );
	}
}