<?php

class DatabaseManagerServiceProviderTest extends BaseTest
{
	public function testDatabaseManagerWhenUsing(){

		$this->assertInstanceOf(\MicroweberPackages\EventManager\DatabaseManager::class, app('database_manager'));
	}

}