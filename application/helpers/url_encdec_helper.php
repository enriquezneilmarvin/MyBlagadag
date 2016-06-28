<?php function encode_url($string, $key="", $url_safe=TRUE)
{
    if($key==null || $key=="")
    {
        $key="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
      $CI =& get_instance();
    $ret = $CI->encrypt->encode($string, $key);

    if ($url_safe)
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }

    return $ret;
}
  function decode_url($string, $key="")
{
     if($key==null || $key=="")
    {
        $key="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
        $CI =& get_instance();
		$string = strtr(
				$string,
				array(
					'.' => '+',
					'-' => '=',
					'~' => '/'
				)
			);

    return $CI->encrypt->decode($string, $key);
}

?>