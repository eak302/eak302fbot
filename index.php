<?php
	//echo "hello";
    //EAAX7OvvVP7kBAMomgnF8pds9MngEv8y9kxBWEFFBD21I4Q8QUS6DKu89jZAR8xJa24w47Qz1rZAjp1EvGFHeNVWgCLMAJ0qfmqpR4EwNxOe2HrCPPK7Wq76NDaNOI5KjDIJSSdpEKKw4jVlY2ZAFIRAGgcZAoEHGzL2pAXHBJwZDZD

    //EAAX7OvvVP7kBAJ69kSW7eYRoL8a7a5stMVnZAuxEOxn3oSNhcMRlpDU6Kf9DJRdSM6eNTXtidyj69UXXuIdwdZCmMja0CWCkqKCyFISZBamwx8gHs3F0cWsrs0cswLVyedWLGNpXmZBOES3H38aT31bjJ7tH2DL3Azb4mHAqqAZDZD

    //curl -ik -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token=EAAX7OvvVP7kBAMomgnF8pds9MngEv8y9kxBWEFFBD21I4Q8QUS6DKu89jZAR8xJa24w47Qz1rZAjp1EvGFHeNVWgCLMAJ0qfmqpR4EwNxOe2HrCPPK7Wq76NDaNOI5KjDIJSSdpEKKw4jVlY2ZAFIRAGgcZAoEHGzL2pAXHBJwZDZD"

    // parameters
    $hubVerifyToken = 'TOKEN123456abcd';
    $accessToken = "EAADTFcQQuJcBAEZBZA4Ju5LyZAwrbkhVMmPwDSrGhKTzLzXKmEwObVxzpc6R8mlm3mlrTP0cfEAcBEURjpq4GFwJrpAz9w0CRLky2IPAAkZCe1MDbPynZCqdcV2J4agSu0PutqdoeTQ0COeA27aMZCRoLB55mMldNv77LLdowdsgZDZD";
    // check token at setup
    if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
      echo $_REQUEST['hub_challenge'];
      exit;
    }
    // handle bot's anwser
    $input = json_decode(file_get_contents('php://input'), true);
    $senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
    $messageText = $input['entry'][0]['messaging'][0]['message']['text'];
    $answer = "I don't understand. Ask me 'hi'.";
    $sender_action = $inpur['entry'][0]['sender_action'];

    if ($messageText != "")
    {
        if($messageText == "hi")
        {
            $answer = "Hello".$senderId." action is: ".$sender_action;
        }
        else if ($messageText == "coffee")
        {
            $answer = "Please Select Coffee";
        }
        else
        {

        }
        $response = [
            'recipient' => [ 'id' => $senderId ],
            'message' => [ 'text' => $answer ]
        ];
        $ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);
        //based on http://stackoverflow.com/questions/36803518
        
    }

    