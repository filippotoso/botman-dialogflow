# Botman Dialogflow Middleware

A Dialogflow middleware for Botman that calls the API only if the current user is not in a conversation drastically reducing the number of calls to Dialogflow (and their cost)

## Requirements

- PHP 7.0+
- Laravel 5.4+
- Botman 2.0+

## Installing

Use Composer to install it:

```
composer require filippo-toso/botman-dialogflow
```

## Using It

In your code, just replace the following use statement:
```
use BotMan\BotMan\Middleware\Dialogflow;
```

with the following one:
```
use FilippoToso\BotMan\Middleware\Dialogflow;
```

That's it! Now your bot will only call the Dialogflow API if the current user is not in a conversation.

## A Fair Warning

If you need Dialogflow to trigger a "global" skip or stop conversation you can't use this middleware. But if your skip/stop conversation is triggered by a specific keyword or regular expression, you are good to go!
