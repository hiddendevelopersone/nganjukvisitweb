<?php


class Notification
{
    private $serverKey = 'AAAADBKKSrQ:APA91bHXdZtK1AcEhmwAYymykMnW-Jmab6AepvLXarnymvoMmKW-yNFss8xV4LUa46hrNDP-Lqh5omUM4NNPrhUyee72h4tS0gu0aqZc9j4-dcUyNCmx1iy1D221ApuP65E8C3PRNJhT';
    private $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

    public function sendNotif($deviceToken, $title, $body, $data)
    {

        $notification = [
            'title' => $title,
            'body' => $body,
            'click_action'=> "arenafinder.com://kitten/account/sign-up" 
        ];

        $message = [
            'to' => $deviceToken,
            'notification' => $notification,
            'data' => $data
        ];

        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json'
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));

        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }

        curl_close($ch);

        return $result;
    }
}