<?php
/*
 * Copyright 2024 BoxC Logistics, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Tests\Events;

use PHPUnit\Framework\TestCase;
use BoxC\Tracking\Events;
use BoxC\Tracking\Exceptions\EventException;

final class FetchingEventsTest extends TestCase
{
    public function testListEvents()
    {
        $obj = new Events("en");
        $events = $obj->getAll();
        // $this->assertIsArray($events);
        $this->assertNotEmpty($events);
    }

    public function testGetEvent()
    {
        $obj = new Events("en");
        $event = $obj->getDescription(100);
        $this->assertEquals("SHIPMENT LABEL CREATED", $event);
    }

    public function testFileNotFound()
    {
        try {
            new Events("zz");
        } catch (EventException $e) {
            $this->assertInstanceOf(EventException::class, $e);
        }
    }

}