<?php
/**
 * Created by PhpStorm.
 * User: tricky
 */


// example payload: payload={"channel": "#'$channel'", "username": "alexa-bot", "attachments": [ { "fallback": "fallback-test", "color": "good", "title": "the-title", "text": "the body", "thumb_url": "https://i.imgur.com/3J4gkcPl.png" } ] }'

namespace App;
use Illuminate\Support\Facades\Log;


class Slack {


    /**
     * Post a message with attachments to slack. For keys you can use in attachments, see: https://api.slack.com/docs/message-attachments
     * @param string $channel
     * @param array $attachments
     * @param string $username
     * @param string $icon
     * @return mixed
     */
    public static function postMessageWithAttachments($channel = Null, $attachments = [], $username="echo-contact-request", $icon = ":unicorn_face:") {
        $channel = is_null($channel) ? config("slack.default_channel") : $channel;
        $data = "payload=" . json_encode(array(
                "channel"       =>  "#".$channel,
                "attachments"   =>  [ $attachments ],
                "username" => $username,
                "icon_emoji"    =>  $icon
            ));

        $result = false;
        try {

            // You can get your webhook endpoint from your Slack settings
            $ch = curl_init(config("slack.webhook_endpoint"));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            // TODO : What should we do if slack throws an exception?
        }

        return $result;
    }
}