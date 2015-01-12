<?php

	include_once( 'phpQuery-onefile.php' );

	$urls_to_crawl = array(
			"69" => "http://www.tokopedia.com/bbmurahshop",
			"70" => "http://www.tokopedia.com/every-thing4u",
			"75" => "http://www.tokopedia.com/tridente",
			"9385" => "https://www.tokopedia.com/aserabure",
			"9386" => "https://www.tokopedia.com/sandro",
			"9387" => "https://www.tokopedia.com/nirwana506",
			"9388" => "https://www.tokopedia.com/nirwanaelet",
			"9389" => "https://www.tokopedia.com/tokodachi",
			"9390" => "https://www.tokopedia.com/dereryyy",
			"9392" => "https://www.tokopedia.com/cuterhuye",
		);
	
	set_time_limit(0);
	
	foreach ($urls_to_crawl as $key => $value) {
		
		$doc = phpQuery::newDocument( file_get_contents( $value ));
	
		$image_url = $doc['.shop-gold-b_logo']->find('img')->attr('src');

		if(empty($image_url))
			$image_url = $doc['.shop-header']->find('img')->attr('src');

		$img = 'images_crawled/shop_' . $key  . '.jpg';
		file_put_contents($img, file_get_contents($image_url));

		echo 'Downloaded : ' . $img . PHP_EOL;

	}


