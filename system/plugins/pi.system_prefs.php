<?php

$plugin_info = array(
						'pi_name'			=> 'System Prefs',
						'pi_version'		=> '0.1.0',
						'pi_author'			=> 'Tim Kelty and Karl Swedberg',
						'pi_author_url'		=> 'http://geniuscar.com/docs and http://www.learningjquery.com',
						'pi_description'	=> 'Use system preferences as variables.',
						'pi_usage'			=> System_prefs::usage()
					);

class System_prefs {
	var $return_data = '';
	
	function System_prefs( $str = '' )
	{
		global $FNS, $TMPL, $PREFS;
		
		$this->return_data = '';
		if ($str == '')
		{
        	$str = $TMPL->tagdata;
		}
		
		// gently lifted from Leevi Graham's LG Add Site Name
		foreach($PREFS->core_ini as $key => $value) {
      if(is_array($value) === FALSE && strpos($str, LD . $key . RD) !== FALSE) {
       $str = str_replace(LD.$key.RD, $value, $str);
      }
		}
		$this->return_data = $str;
	}
	
	function usage()
	{
		return "{exp:system_prefs}....{/exp:system_prefs}";
	}
	
}