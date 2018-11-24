<?php
		require('./exampleBase.php');
		$eth = $web3->eth;
		$blockTN='';
		$hash= '';
		$size= '';
		$gasUsed= '';
		$timestamp='';
		$output='';
		$TXn='';
		$i='';
		$eth->blockNumber(function ($err, $blockNumber) use($blockTN){
		$i=(int)(string)$blockNumber;
		require('./exampleBase.php');
 		$eth=$web3->eth;
			$eth->getBlockByNumber($i , true, function ($err, $block){
				$output='';
				$hash= $block->{'hash'};
				$size= hexdec($block->{'size'});
				$number=hexdec($block->{'number'});
				$gasUsed= hexdec($block->{'gasUsed'});
				$timestamp= $block->{'timestamp'};
				$timestamp = base_convert($timestamp, 16, 10);
				$timestamp = date('Y-m-d H:i:s', $timestamp);
				$TXn=sizeof($block->transactions);
				$output = $number.",".$hash.",".$size.",".$gasUsed.",".$timestamp.",".$TXn;
				// echo htmlspecialchars($output);

				$return = [];
				$return['number'] = $number;
				$return['hash'] = $hash;
				$return['size'] = $size;
				$return['gasUsed'] = $gasUsed;
				$return['timestamp'] = $timestamp;
				$return['TXn'] = $TXn;

				if($TXn > 0) {
					$return['transactions'] = $block->transactions;
				}

				echo json_encode($return);
			});
		});
