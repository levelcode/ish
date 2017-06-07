<?php

  $fb = new Facebook\Facebook([
    'app_id' => '1320185844755160', // Replace {app-id} with your app id
    'app_secret' => '1c3af0cd3625c0c3a11669e20b6478a7',
    'default_graph_version' => 'v2.2',
    ]);

  $helper = $fb->getRedirectLoginHelper();

  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>
