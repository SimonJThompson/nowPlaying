<?php

	/**
	* A class to return and display currently playing tracks. 
	*
	* @author       Simon Thompson <me@wordofsi.com>
	*
	*/
	
	class nowPlaying
	{
	
		//Configuration
		private $displayMessage	=	"I'm not listening to anything right now...";
		private $displayFormat	=	"[ARTIST] - [TRACK]";
		
		//Service URLs
		private $url_lastFM		=	"";
		
		function __construct($user,$apiKey)
		{
			$this->url_lastFM  = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&limit=1";
			$this->url_lastFM .= "&user=" . $user . "&api_key=" . $apiKey;
		}
		
		function set_message($value){$this->displayMessage	=	$value;}
		function set_format($value){$this->displayFormat	=	$value;}
		
		function nowPlaying($print	=	true)
		{
			$xml			= simplexml_load_file($this->url_lastFM);
			
			if($xml){

				$tracks = $xml->recenttracks->track;	
				
				$track_nowplaying		= $tracks[0]->attributes()->nowplaying;
				$track_name				= $tracks[0]->name;
				$track_artist			= $tracks[0]->artist;
				
				$display				= $this->displayFormat;

				$display				= str_replace("[TRACK]",$track_name,$display);
				$display				= str_replace("[ARTIST]",$track_artist,$display);
				
				if($track_nowplaying	==	"true")
				{
				
					if($print){
						echo $display;
					}else{
						return $display;
					}
					
				}else{
					$this->printMessage();
				}
				
			}else{
				$this->printMessage();
				return false;
			}
			
		}
		
		private function printMessage()
		{
			echo $this->displayMessage;
		}
		
	}

?>