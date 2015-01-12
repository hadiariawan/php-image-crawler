<?php

	include_once( 'phpQuery-onefile.php' );

	$urls_to_crawl = array(
			"92" => "https://www.bukalapak.com/ruangselular",
			"93" => "https://www.bukalapak.com/andipraztshop",			
			"15671" => "https://www.bukalapak.com/molamola88",
			"15672" => "https://www.bukalapak.com/satrioarcade",
			"15673" => "https://www.bukalapak.com/tukangsolahart",
			"15674" => "https://www.bukalapak.com/nac_store",
			"15675" => "https://www.bukalapak.com/jingga0196",
			"15676" => "https://www.bukalapak.com/guntoro46911",

		);

	set_time_limit(0);
	
	foreach ($urls_to_crawl as $key => $value) {
		
		$doc = phpQuery::newDocument( file_get_contents( $value ));
		
		$image_url = $doc['#user_info']->find('img')->attr('src');
		$image_url = str_replace('/small/', '/medium/', $image_url);

		$img = 'images_crawled/shop_' . $key  . '.jpg';
		file_put_contents($img, file_get_contents($image_url));

		echo 'Downloaded : ' . $img . PHP_EOL;

	}
