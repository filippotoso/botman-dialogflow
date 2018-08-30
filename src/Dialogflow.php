<?php

namespace FilippoToso\Botman\Middleware;

use Illuminate\Support\Facades\Cache;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Middleware\Dialogflow as DialogflowMiddleware;

class Dialogflow extends DialogflowMiddleware
{
    
    /**
     * Handle an incoming message.
     *
     * @param IncomingMessage $message
     * @param callable $next
     * @param BotMan $bot
     *
     * @return mixed
     */
    public function received(IncomingMessage $message, $next, BotMan $bot)
    {

        // Set to null to avoid undefined index in BotMan\BotMan\Middleware\ApiApi::matching()
        $message->addExtras('apiAction', null);

        // If it's not a bot, nor the current message is related to a cached conversation
        if (!$message->isFromBot() &&
           (!(Cache::has($message->getConversationIdentifier()) ||
              Cache::has($message->getOriginatedConversationIdentifier())))) {

            // Call the original Dialogfow middleware method
            parent::received($message, $next, $bot);

        }

        return $next($message);

    }

}
