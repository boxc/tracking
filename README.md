# BoxC Tracking

A model and dictionary of tracking events supported by BoxC.

## Requirements

Requires:
- PHP >= 8.1
- ext-mongodb

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
