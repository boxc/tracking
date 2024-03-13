# BoxC Tracking

A dictionary of tracking events supported by BoxC. This library can be imported into PHP projects. Might serve more purposes in the future.

## Requirements

Requires:
- PHP >= 8.1

## Usage

For listing and getting events:

```php
$language = "en";
$cls = new BoxC\Tracking\Events($language);
// returns associated array of all events with key being the event code
$cls->getAll();

// outputs an event description
$cls->getDescription(100);
```
