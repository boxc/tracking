<?php
/*
 * Copyright 2022 BoxC Logistics
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

final class FetchingEventsTest extends TestCase
{

    public function testListEvents()
    {
        $obj = new Events();
        $events = $obj->list(true);
        // $this->assertIsArray($events);
        $this->assertNotEmpty($events);
    }

    public function testGetEvent()
    {
        $obj = new Events();
        $event = $obj->get(100);
        $this->assertEquals("SHIPMENT LABEL CREATED", $event);
    }

}