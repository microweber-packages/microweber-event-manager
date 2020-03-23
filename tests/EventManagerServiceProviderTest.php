<?php

class EventManagerServiceProviderTest extends BaseTest
{
	public function testEventManagerWhenUsing() {
		$this->assertInstanceOf(\MicroweberPackages\EventManager\EventManager::class, app('event_manager'));
	}
}