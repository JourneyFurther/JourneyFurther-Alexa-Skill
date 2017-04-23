<?php

/* Settings for slack api integration
 *
 */

return [

    /* url of slack webhook to post slack messages to */
    'webhook_endpoint' => env('SLACK_WEBHOOK_URL', ''),

    /* slack channel to post to */
    'default_channel' => env('SLACK_CHANNEL', 'echo'),

];

