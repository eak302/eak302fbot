<?php
	//echo "hello";
    //EAAX7OvvVP7kBAMomgnF8pds9MngEv8y9kxBWEFFBD21I4Q8QUS6DKu89jZAR8xJa24w47Qz1rZAjp1EvGFHeNVWgCLMAJ0qfmqpR4EwNxOe2HrCPPK7Wq76NDaNOI5KjDIJSSdpEKKw4jVlY2ZAFIRAGgcZAoEHGzL2pAXHBJwZDZD

    $verify_token = "EAAX7OvvVP7kBAMomgnF8pds9MngEv8y9kxBWEFFBD21I4Q8QUS6DKu89jZAR8xJa24w47Qz1rZAjp1EvGFHeNVWgCLMAJ0qfmqpR4EwNxOe2HrCPPK7Wq76NDaNOI5KjDIJSSdpEKKw4jVlY2ZAFIRAGgcZAoEHGzL2pAXHBJwZDZD";

    if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) { 
        echo $_REQUEST['hub_challenge']; 
    }