nowPlaying
==========

nowPlaying is a PHP class for displaying currently playing tracks on Last.FM.

Usage
=======
Using the class is simple. Assuming the class file is in the same directory as the file you are attempting to include it in,
just use the following line to include the class;

```php
    include_once("class.listeningNow.php");
```

Next, set up the class and fetch the track.

```php
    $np	=	new nowPlaying("lastFMUsername","lastFMAPIKey");  // Create the object and instantiate the class
    $np->nowPlaying();                                      // Fetch and display the currently playing track.
```

You can find your Last.FM API key at http://www.last.fm/api/accounts
    
Formatting The Response
=======

nowPlaying allows you to format what is displayed about the track, and in the order. To change the formatting in the 
above example, you could use;

```php
     $np->set_format("[ARTIST] - [TRACK]");
```     
     
Which would print something like;

    Artist Name - Track Name
    
The formatting can handle additional characters, as shown with the "-". The options available currently are

    [ARTIST]
    [TRACK]
    
There are plans to include conditional formatting for stand-out tracks such as those which are "loved" or liked.

Setting Alternative Messages
=========
You can set an alternative message to be displayed when there is no response or nothing being listened to. You can do this
as follows.

```php
    $np->set_message("I'm not listening at the moment...");
```

Return, not display
=======
You can set a variable with the response of nowPlaying() by passing a "false" parameter to it. For instance;

```php
    $foo  = $np->nowPlaying(false); 
```
