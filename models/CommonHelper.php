<?php
namespace app\models;

/**
* 
*/
class CommonHelper
{

	public static function multiExplode($delimiters,$string) {
	    return explode(
	        $delimiters[0],
	        strtr(
	            $string,
	            array_combine(
	                array_slice($delimiters, 1  ),
	                array_fill(
	                    0,
	                    count($delimiters)-1,
	                    array_shift($delimiters)
	                )
	            )
	        )
	    );
	}


	public static function randomCode($capitalOnly=FALSE,$long=6) {
		// return rand(123456,999999);
		$text = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		if($capitalOnly)
		{
			$text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		}

		return substr(str_shuffle($text) , 0 , $long );
	}

	public static function randomPassword() {
		return "123456";
		// return rand(123456,999999);
		// return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
	}

    public static function middleCensor($text)
    {
		$length = strlen($text);
		if($length)
		{
			switch ($length) {
				case $length > 6:
			    	$first = substr($text,0,3);
					$middle = str_repeat("*", $length-5);
			    	$last = substr($text,-2);
			    	$returnData = implode('',[$first,$middle,$last]);
					# code...
					break;
				
				default:
					$returnData = $text;
					# code...
					break;
			}
		}
		else
		{
			$returnData = $text;						
		}

		return $returnData;

    }

    public static function getActiveMenu($item,$in_array=[],$return_true=TRUE,$return_false=FALSE)
    {
    	if(in_array($item,$in_array))
    	{
			return $return_true;    		
    	}
    	else
    	{
			return $return_false;    		
    	}

    }

	public static function getTAC($sessionUnique,$force=FALSE)
	{
        $getSession = \yii::$app->session->get($sessionUnique);
        if(!$getSession)
        {
			$getSession = rand(123456,999999);
	        \yii::$app->session->set($sessionUnique, $getSession);				
        }
		if($force==TRUE)
		{
			$getSession = rand(123456,999999);
	        \yii::$app->session->set($sessionUnique, $getSession);			
		}        
        return $getSession;
	}

	public static function setFlashMessage($key,$type,$title,$message)
	{
		switch ($type) {
			case 'success':
				$message = "
					<div class='alert alert-success alert-dismissible'>
	                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                	<h4><i class='icon fa fa-check'></i> {$title}</h4>
	                	{$message}
	              	</div>
				";				
				# code...
				break;
			case 'error':
				$message = "
					<div class='alert alert-danger alert-dismissible'>
	                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                	<h4><i class='icon fa fa-ban'></i> {$title}</h4>
	                	{$message}
	              	</div>
				";				
				# code...
				break;			
			case 'warning':
				$message = "
					<div class='alert alert-warning alert-dismissible'>
	                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	                	<h4><i class='icon fa fa-ban'></i> {$title}</h4>
	                	{$message}
	              	</div>
				";				
				# code...
				break;			
			default:
				# code...
				break;
		}
		\Yii::$app->session->setFlash($key, $message);		
	}

	public static function getFlashMessage($key)
	{
		return \yii::$app->session->getFlash($key);
	}

	public static function getBirthdayDropdown($type="date")
	{
		switch ($type) {
			case 'date':
				$date = [];
				for ($i=01; $i < 32; $i++) { 
					$date[sprintf("%02d", $i)] = sprintf("%02d", $i); 
					# code...
				}
				return $date;
				# code...
				break;
			case 'month':
				return [
					'01'=>'January',
					'02'=>'February',
					'03'=>'March',
					'04'=>'April',
					'05'=>'May',
					'06'=>'June',
					'07'=>'July',
					'08'=>'August',
					'09'=>'September',
					'10'=>'October',
					'11'=>'November',
					'12'=>'December',
				];
				# code...
				break;
			case 'year':
				$years = [];
				$year_from = '1900';
				$year_to = date('Y',strtotime("-9 Years"));
				for ($i=$year_from; $i < $year_to; $i++) { 
					$years[$i] = $i;
					# code...
				}
				return $years;
				# code...
				break;			
			default:
				# code...
				break;
		}
	}

	public static function normalize_msisdn_format($msisdn)
	{
		return str_replace('-','',$msisdn);
	}

	public static function number_format($value,$digit=2)
	{
		return number_format($value,$digit);
	}

	public static function currency_format($value,$digit=2,$currency="MYR")
	{
		switch ($currency) {
			case 'MYR':
				return "RM ".number_format($value,$digit);
				# code...
				break;
			case 'PIN':
				return round($value)." PIN";
				# code...
				break;			
			case 'QOIN':
				return "RM ".number_format($value,$digit);
				# code...
				break;	
			default:
				return number_format($value,$digit);
				# code...
				break;
		}

	}

	public static function mySimpleCrypt($string, $action = 'e',$secret_key="be_mobile_encrypt_key",$secret_iv="be_mobile_encrypt_iv") {
	 
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $key = hash( 'sha256', $secret_key );
	    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
	    if( $action == 'e' ) {
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	    }
	    else if( $action == 'd' ){
	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	    }
	 
	    return $output;
	}

	public static function letterAvatar($text="Annonymous")
	{
		$text = isset($text) ? $text : "Annonymous";
		$avatar = new \YoHang88\LetterAvatar\LetterAvatar($text);

		return $avatar;
		// Square Shape, Size 64px
		// $avatar = new LetterAvatar('Steven Spielberg', 'square', 64);		
	}
	
	public static function returnData($returnData,$returnFormat=null)
	{
		$returnFormat = ($returnFormat) ? $returnFormat :\Yii::$app->request->get('return_format'); 
		switch (\Yii::$app->request->get('return_format')) {
			case 'array':
				echo "<pre>";
				print_r($returnData);
				echo "</pre>";
				# code...
				break;
			
			default:
				echo json_encode($returnData);
				# code...
				break;
		}
	}


	public static function number_format_short($n) 
	{
		if ($n > 0 && $n < 1000) {
			// 1 - 999
			$n_format = floor($n);
			$suffix = '';
		} else if ($n >= 1000 && $n < 1000000) {
			// 1k-999k
			$n_format = floor($n / 1000);
			$suffix = 'K+';
		} else if ($n >= 1000000 && $n < 1000000000) {
			// 1m-999m
			$n_format = floor($n / 1000000);
			$suffix = 'M+';
		} else if ($n >= 1000000000 && $n < 1000000000000) {
			// 1b-999b
			$n_format = floor($n / 1000000000);
			$suffix = 'B+';
		} else if ($n >= 1000000000000) {
			// 1t+
			$n_format = floor($n / 1000000000000);
			$suffix = 'T+';
		}

		return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
	}

	public static function getRealRedirectUrl($url)
	{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers

        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

        // Uncomment to see all headers
        /*
        echo "<pre>";
        print_r($a);echo"<br>";
        echo "</pre>";
        */

        echo $url; // Voila
        // return $this->render('preview');		
	}

	public static function partition($list, $p)
	{
		$listlen = count( $list );
	    $partlen = floor( $listlen / $p );
	    $partrem = $listlen % $p;
	    $partition = array();
	    $mark = 0;
	    for ($px = 0; $px < $p; $px++) {
	        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
	        $partition[$px] = array_slice( $list, $mark, $incr );
	        $mark += $incr;
	    }
	    return $partition;
	}

	public static function filterByValue($array=[],$filterValue=null)
	{
		if($array)
		{
	        foreach ($array as $key => $value) 
	        {
	            # code...
	            if($value!==$filterValue)
	            {
	                $arrayFilter[$key] = $value;
	            }
	        }		
	        return $arrayFilter;			
		}
		else
		{
			return [];
		}

	}	

	public static function multiArrayToTable($data,$recursive=FALSE)
	{
		if(isset($data))
		{
			if($recursive==FALSE)
			{
				echo "<div class='table-responsive'>";
				echo "<table class='table table-striped table-hover'>";			
			}
			if(is_array($data))
			{
				foreach ($data as $key => $value) 
				{
					echo "<tr>";
					if(is_array($value))
					{
						if(is_int($key))
						{
								$countValue = count($value);
								echo "<th class='default' colspan={$countValue}></th>";
								self::multiArrayToTable($value,TRUE);															
						}
						else
						{
							$key = \common\models\StringHelper::autoSpaceUpperString($key);
							$countValue = count($value);
							echo "<th class='success' colspan={$countValue}>{$key}</th>";
							self::multiArrayToTable($value,TRUE);															
						}

					}
					else
					{
						$key = is_int($key) ? $key+1 : \common\models\StringHelper::autoSpaceUpperString($key);
						echo "<th class='success'>{$key}</th>";
						echo "<td>{$value}</td>";					
					}
					# code...
					echo "</tr>";
				}
			}
			if($recursive==FALSE)
			{
				echo "</table>";
				echo "</div>";
			}				
		}


	}

    public static function getCleanText($string)
    {
        $strip_tags = strip_tags($string,'<p><b><h1><span><i><h2><h3><ul><li><img>');
        return str_replace(["<img","data-dsrc"],["<img class='img-responsive'","src"],$strip_tags);
    }

}
