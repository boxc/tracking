# BoxC Tracking

A dictionary of tracking events supported by BoxC. This library can be imported into PHP projects. Might serve more purposes in the future.

## Requirements

Requires:
- PHP >= 5.5

## Usage

For listing and getting events:

```php
$cls = new BoxC\Tracking\Events();
// returns associated array of all events with key being the event code
$cls->getAll();

// outputs an event description
$cls->get(100);
```
