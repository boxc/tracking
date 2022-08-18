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

namespace BoxC\Tracking;

use BoxC\Tracking\Exceptions\EventException;

class Events {

    const FILE_LOCATION = "/data/events.json";

    /**
     * @var $dict List of events
     */
    private $dict = [];

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $events = file_get_contents(__DIR__.self::FILE_LOCATION);
        $this->dict = json_decode($events, true);
    }

    /**
     * Gets an event description based on the code.
     * 
     * @param int $code
     * 
     * @return string
     * @throws EventException
     */
    public function get($code)
    {
        if (!array_key_exists((int) $code, $this->dict)) {
            throw new EventException(sprintf("Event code '%s' does not exist.", $code));
        }

        return $this->dict[(int) $code];
    }

    /**
     * List all events
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->dict;
    }
}