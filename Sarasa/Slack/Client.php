<?php

namespace Sarasa\Slack;

class Slack
{
    protected $endpoint;

    protected $message;

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function send()
    {
        //curl -X POST --data-urlencode 'payload={"text": "This is posted to <#general> and comes from *monkey-bot*.", "channel": "#general", "username": "monkey-bot", "icon_emoji": ":monkey_face:"}' https://hooks.slack.com/services/T00000000/B00000000/XXXXXXXXXXXXXXXXXXXXXXXX
        

        $data = "payload=" . json_encode(
            array(
                "channel"  =>  "#frontend",
                "text"     =>  'Testing...',
                "icon_url" =>  'https://mazmocdn.com/img/logos/facebook.jpg'
            )
        );

        // You can get your webhook endpoint from your Slack settings
        $ch = curl_init($this->getEndpoint());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
