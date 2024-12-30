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

namespace BoxC\Tracking\Entities;

use DateTime;

/**
 * Entity - Event
 *
 */
class Event
{
    private readonly DateTime $created;

    /**
     * @param string $tracking_number
     * @param int $code
     * @param string $carrier
     * @param DateTime $time
     * @param string|null $description
     * @param string|null $location
     * @param string|null $city
     * @param string|null $province
     * @param string|null $postal_code
     * @param string|null $country
     */
    public function __construct(
        public readonly string $tracking_number,
        public readonly int $code,
        public readonly string $carrier,
        public readonly DateTime $time,
        public ?string $description = null, // Raw description
        public ?string $location = null, // Raw location
        public ?string $city = null,
        public ?string $province = null,
        public ?string $postal_code = null,
        public ?string $country = null
    ) {
        $this->created = new DateTime();
    }

}