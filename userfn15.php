<?php
namespace PHPMaker2019\esbc_public_20181122;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Global user functions
// Page Loading event
function Page_Loading() {

	//echo "Page Loading";
}

// Page Rendering event
function Page_Rendering() {

	//echo "Page Rendering";
}

// Page Unloaded event
function Page_Unloaded() {

	//echo "Page Unloaded";
}

// Personal Data Downloading event
function PersonalData_Downloading(&$row) {

	//echo "PersonalData Downloading";
}

// Personal Data Deleted event
function PersonalData_Deleted($row) {

	//echo "PersonalData Deleted";
}

function read_BC() {

	//return 'hi';
	require('./exampleBase.php');
	$eth = $web3->eth;
	$array = array("foo", "bar", "hello", "world");
	$blockTN=0;
	$bcstr1='';
	$bcstr2='';
	$bcstr='';
	$sql1='';
	$sql2='';
	$Bindex=0;
	$eth->blockNumber(function ($err, $blockNumber) use($blockTN){
		if ($err !== null) {
			echo 'Error: ' . $err->getMessage();
			return;
		}
		 $GLOBALS['blockTN']=$blockNumber;
	});
		for ($x=1;$x<=20;$x++){

 //TABLE `esbc_chainstatus` (`Bindex`,`BlockN`, 'BlockHash`,`Difficulty`, `Size`,`Age`,`BlockDetail`,`TXs`,`TXDetail`,`GasUsed`
			$i=(int)(string)$GLOBALS['blockTN']-(int)(string)$x;
			$BlockN =$i;

			//$bcstr .= 'BlockN= '. $BlockN . '<BR>';
			$GLOBALS['Bindex']=$x;
			$GLOBALS['sql1']="update esbc_chainstatus set BlockN=".$BlockN.",";
			$eth->getBlockByNumber($i , true, function ($err, $block){
				if ($err !== null) {
				echo 'Error: ' . $err->getMessage();
				return;
			}				
			 $str = '';
			 $str .= 'difficulty= '.$block->{'difficulty'}.'<BR>'.PHP_EOL;
			 $str .= 'extraData= '.$block->{'extraData'}.'<BR>'.PHP_EOL;
			 $str .= 'gasLimit= '.$block->{'gasLimit'}.'<BR>'.PHP_EOL;
			 $str .= 'gasUsed= '.$block->{'gasUsed'}.'<BR>'.PHP_EOL;
			 $str .= 'hash= '.$block->{'hash'}.'<BR>'.PHP_EOL;
			 $str .= 'logsBloom= '.$block->{'logsBloom'}.'<BR>'.PHP_EOL;
			 $str .= 'miner= '.$block->{'miner'}.'<BR>'.PHP_EOL;
			 $str .= 'mixHash= '.$block->{'mixHash'}.'<BR>'.PHP_EOL;
			 $str .= 'nonce= '.$block->{'nonce'}.'<BR>'.PHP_EOL;
			 $str .= 'number= '.$block->{'number'}.'<BR>'.PHP_EOL;
			 $str .= 'parentHash= '.$block->{'parentHash'}.'<BR>'.PHP_EOL;
			 $str .= 'receiptsRoot= '.$block->{'receiptsRoot'}.'<BR>'.PHP_EOL;
			 $str .= 'sha3Uncles= '.$block->{'sha3Uncles'}.'<BR>'.PHP_EOL;
			 $str .= 'size= '.$block->{'size'}.'<BR>'.PHP_EOL;
			 $str .= 'stateRoot= '.$block->{'stateRoot'}.'<BR>'.PHP_EOL;
			 $str .= 'timestamp= '.$block->{'timestamp'}.'<BR>'.PHP_EOL;

			// echo 'timestamp= '.$block->{'timestamp'}.'<br>';
			 $str .= 'totalDifficulty= '.$block->{'totalDifficulty'}.'<BR>'.PHP_EOL;
			 $str .= 'transactionsRoot= '.$block->{'transactionsRoot'}.'<BR>'.PHP_EOL;

			 //$str .= 'uncles= '.$block->{'uncles'}.'<BR>'.PHP_EOL;
			 $BlockDetail =$str;

			// $bcstr1 = 'BlockDetail= '.$BlockDetail . '<BR>';
			 //echo $BlockDetail;

 			 if (sizeof($block->transactions)>0) {
			   $str="";
			   $trans=$block->transactions;
			   	$TXDetail='';

			   //echo var_dump($trans);
			    foreach ($trans as $tran) {
			   	  $str=$str.'blockNumber= '.$tran->{'blockNumber'}.'<BR>'.PHP_EOL;
				  $str=$str.'blockHash= '.$tran->{'blockHash'}.'<BR>'.PHP_EOL;
				  $str=$str.'from= '.$tran->{'from'}.'<BR>'.PHP_EOL;
				  $str=$str.'to= '.$tran->{'to'}.'<BR>'.PHP_EOL;
				  $str=$str.'hash= '.$tran->{'hash'}.'<BR>'.PHP_EOL;
				  $str=$str.'transactionIndex= '.$tran->{'transactionIndex'}.'<BR>'.PHP_EOL;
				  $str=$str.'gas= '.hexdec($tran->{'gas'}).'<BR>'.PHP_EOL;
				  $str=$str.'gasPrice= '.hexdec($tran->{'gasPrice'}).'<BR>'.PHP_EOL;
				  $str=$str.'value= '.hexdec($tran->{'value'}).'<BR>'.PHP_EOL;
				  $str=$str.'nonce= '.$tran->{'nonce'}.'<BR>'.PHP_EOL;
				  $str=$str.'Input hex= '.$tran->{'input'}.'<BR>'.PHP_EOL;
				  $hex=$tran->{'input'};

				  // $a=hexToStr($hex);
				  $string='';
				  if (strlen($hex)>4) {
					  	 for ($i=0;$i<strlen($hex)-1;$i+=2){
							 if ($hex[$i+1]<>'x'){				
							$string .= chr(hexdec('0x'.$hex[$i].$hex[$i+1]));
							  }
						 }
				  }
				  $string=str_replace(",",",<BR>",$string);
				  $string=str_replace("{","<BR>{<BR>",$string);
				  $string=str_replace("}","<BR>}",$string);
				  $str=$str.'Input str= '.$string.'<BR>'.PHP_EOL;
				  $str=$str.'v= '.$tran->{'v'}.'<BR>'.PHP_EOL;
				  $str=$str.'r= '.$tran->{'r'}.'<BR>'.PHP_EOL;
				  $str=$str.'s= '.$tran->{'s'}.'<BR>'.PHP_EOL;
				  $str=$str.'=============================<BR>'.PHP_EOL;
			    }
			 $TXDetail .=  $str;

			//  $GLOBALS['TXD'] .= $TXDetail;
			// $bcstr2 = 'TXDetail= '.$TXDetail . '<BR>';
			 //echo $TXDetail;

			 } 

			 //$BlockDetail=$BlockDetail;
			$TXs=sizeof($block->transactions);
			$BlockHash=$block->{'hash'};
			$Difficulty=hexdec($block->{'totalDifficulty'});
			$Size=hexdec($block->{'size'});
			$Age=hexdec($block->{'timestamp'});
			$GasUsed =hexdec($block->{'gasUsed'});

			//$sql2="'BlockHash`='".$BlockHash."',`Difficulty`='".$Difficulty."',`Size`='".$Size."',";
			//$sql2.="`Age`='".$Age."',`BlockDetail`='".$BlockDetail."',`TXs`='".$TXs."',`TXDetail`='".$TXDetail."',`GasUsed`='".$GasUsed."'";

			$sql2="BlockHash='".$BlockHash."',Difficulty='".$Difficulty."',Size='".$Size."',";
			$sql2.="Age='".$Age."',TXs='".$TXs."',GasUsed='".$GasUsed."'";

			//$sql3=  $GLOBALS['sql1'].$sql2." where Bindex=".$GLOBALS['Bindex'];
			//echo $sql3.'<BR>';
			//$sql2="BlockHash='".$BlockHash."',Difficulty='".$Difficulty."',Size='".$Size."',";
			//$$sql2.="Age='".$Age."',BlockDetail='".$BlockDetail."',TXs='".$TXs."',TXDetail='".$TXDetail."',GasUsed='".$GasUsed."'";

			$sql3=  $GLOBALS['sql1'].$sql2." where Bindex=".$GLOBALS['Bindex'];

			//echo $GLOBALS['sql1'].'<BR>';
			//$dbhelper2 = &DbHelper();
			//echo $sql3.'<BR>';

			$rs = Conn()->Execute($sql3);

			//echo $rs.'<BR>';
			//$rs = Conn()->Executel($sql3, array("fieldcaption" => TRUE, "tablename" => array("esbc_chainstatus")));

			});		    
		}
		return '';
	}
?>
