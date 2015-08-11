<?php
$consumer_key = '<dj0yJmk9UUZxOGFmNklyTUVyJmQ9WVdrOVNqUkNjMmhxTXpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD04MA-->';
$consumer_secret = '<d3ab56481758ac9a99a46224c7655799ea946b7c>';

$o = new OAuth( $consumer_key, $consumer_secret,
                OAUTH_SIG_METHOD_HMACSHA1,
                OAUTH_AUTH_TYPE_URI );

$url = 'http://fantasysports.yahooapis.com/fantasy/v2/game/nfl';

try {
  if( $o->fetch( $url ) ) {

    print $o->getLastResponse();

    print "Successful fetch\n";
  } else {
    print "Couldn't fetch\n";
  }
} catch( OAuthException $e ) {
  print 'Error: ' . $e->getMessage() . "\n";
  print 'Response: ' . $e->lastResponse . "\n";
}
?>