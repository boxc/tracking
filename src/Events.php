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

namespace BoxC\Tracking;

use BoxC\Tracking\Exceptions\EventException;

class Events
{
    private const FILE_LOCATION = "/dictionary/";
    public const DEFAULT_LANGUAGE = "en";

    /**
     * @property array $dictionary
     */
    private array $dictionary = [];

    /**
     * @param string $language
     * @throws EventException
     */
    public function __construct(string $language = self::DEFAULT_LANGUAGE)
    {
        $fileName = __DIR__ . self::FILE_LOCATION . $language . ".json";
        if (file_exists($fileName)) {
            $events = file_get_contents($fileName);
        } else {
            throw new EventException(
                sprintf("File not found: %s.json", $language)
            );
        }

        $events = json_decode($events, true);
        if ($events === false) {
            throw new EventException(
                sprintf("File can't be decoded: %s.json", $language)
            );
        }

        $this->dictionary = $events;
    }

    /**
     * Gets an event description based on the code.
     * 
     * @param int $code
     * @return string
     * @throws EventException
     */
    public function getDescription(int $code): string
    {
        if (array_key_exists($code, $this->dictionary) === false) {
            throw new EventException(
                sprintf("Event code '%s' does not exist.", $code)
            );
        }

        return $this->dictionary[$code];
    }

    /**
     * List all events
     * 
     * @return array
     */
    public function getAll(): array
    {
        return $this->dictionary;
    }
}