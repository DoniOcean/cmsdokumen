<?php defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * PyroCMS Text Helpers
 *
 * This overrides CodeIgniter's helpers/text_helper.php file.
 * 
 * @package    PyroCMS\Core\Helpers
 * @author     PyroCMS Dev Team
 * @copyright  Copyright (c) 2012, PyroCMS LLC
 */
if ( ! function_exists('install_tables'))
{
  function install_tables($tables)
{   $ci = get_instance();
	log_message('error', 'Will go ahead and create the following tables: '.implode(', ', array_keys($tables)));
	foreach ($tables as $table_name => $fields)
	{
		log_message('error', '-- Creating table: '.$table_name);
		// First we go ahead and add all the fields.
		$ci->dbforge->add_field($fields);


		// Then go ahead and check for our special cases such as, primary
		// and fulltext keys.
		$key_types = array(
			'primary' => array(),
			'fulltext' => array(),
			'unique' => array(),
			'key' => array(),
		);

		// For all the fields of this table definition:
		foreach ($fields as $field => $field_data)
		{
			// For each of the key types we know
			foreach (array_keys($key_types) as $type)
			{
				// Check with every property of the field definition...
				foreach ($field_data as $key => $value)
				{
					// to find if any of the one-above key types.
					if ($key === $type)
					{
						 _add_to_array($key_types[$type], $value, $field, $type);
					}

					// This is purely for convenience here since 'index' is
					// a synonym to 'key'.
					if ($key == 'index')
					{
						 _add_to_array($key_types['key'], $value, $field, 'key');
					}
				}
			}
		}

		// Add primary keys
		 _add_keys('primary', $key_types['primary']);

		// Add normal keys
		 _add_keys('key', $key_types['key']);

		// Then we create the table (if not exists).
		if ( ! $ci->dbforge->create_table($table_name, true))
		{
			log_message('error', '-- Table creation for '.$table_name.' failed.');
			return false;
		}

		// Then we create the fulltext keys.
		if ( !  _create_keys('fulltext', $key_types['fulltext'], $table_name))
		{
			log_message('error', '-- Fulltext key creation failed for '.$table_name);
			return false;
		}

		// Then we create the rest of the keys.
		if ( !  _create_keys('unique', $key_types['unique'], $table_name))
		{
			log_message('error', '-- Unique key creation failed for '.$table_name);
			return false;
		}
	}
	log_message('error', 'All done perfectly!');
	return true;
}
}

if ( ! function_exists('_add_to_array'))
{
  function _add_to_array(&$arr, $index, $value, $type='')
{ 
	if(is_array($value)) {
		foreach ($value as $v)
		{
			 _add_to_array($arr, $index, $v, $type);
		}
	}

	if ( is_bool($index) and $index === true)
	{
		// The key/index takes the fields name.
		$index = ( ! empty($type)) ? $type.'_'.$value : $value;
	}

	// If we dont have a key for this
	if (!array_key_exists($index, $arr))
	{
		// Go ahead and create it
		$arr[$index] = array();
	}
	// Add it
	$arr[$index][] = $value;
}
}

if ( ! function_exists('_add_keys'))
{
  function _add_keys($type, $keys)
{ 	$ci = get_instance();
	if (count($keys) > 0)
	{
		if (count($keys) > 1)
		{
			// Primary keys are special cases.
			if ($type == 'primary')
			{
				// Add them one by one.
				foreach ($keys as $i => $primary_key)
				{
					$ci->dbforge->add_key($keys[$i], true);
				}
			}
			// Everything else can be just be supplied as an array.
			else
			{
				$ci->dbforge->add_key($keys);
			}
		}
		else
		{
			$array_keys = array_keys($keys);
			$ci->dbforge->add_key($keys[array_shift($array_keys)], ($type == 'primary'));
		}
	}
}
}

if ( ! function_exists('_create_keys'))
{
  function _create_keys($type, $keys, $table)
{
	// Sorry, we only support specific keys for now
	if ( ! in_array($type, array('fulltext', 'unique')))
	{
		return false;
	}

	// Make sure the type is uppercase
	$type = strtoupper($type);

	if (count($keys) > 0)
	{
		// @todo there is no checking whether the index exists already.

		// FULLTEXT is only available on MyISAM.
		if($type === 'FULLTEXT') {
			$sql = 'ALTER TABLE '.$ci->db->dbprefix($table).' ENGINE = MyISAM';
			if ( ! $ci->db->query($sql) ) {
				log_message('error', '-- -- Failed turning the engine for '.$table.' to MyISAM. SQL: '.$sql);
				return false;
			}
		}
		foreach ($keys as $key => $fields)
		{
			$sql = 'CREATE '.$type.' INDEX '.$key.' ON '.$ci->db->dbprefix($table).'('.implode(', ', $fields).')';
			if ( ! $ci->db->query($sql))
			{
				log_message('error', '-- -- Failed creating key '.$type.' for '.$table.': '. $sql);
				return false;
			}
		}
	}

	return true;
}
}

if ( ! function_exists('nl2p'))
{
	/**
	 * Replaces new lines with <p> HTML element.
	 * 
	 * @param string $str The input string.
	 * @return string The HTML string.
	 */
	function nl2p($str)
	{
		return str_replace('<p></p>', '', '<p>'
			.nl2br(preg_replace('#(\r?\n){2,}#', '</p><p>', $str))
			.'</p>');
	}

}

if ( ! function_exists('escape_tags'))
{
	/**
	 * Replaces the { and } with their HTML character code equivalents. This will take
	 * care of double {{ }} PyroCMS tags as well as the single ones which are used
	 * to pass plugin results as plugin parameters.
	 *
	 * @param string $string The string with tags.
	 * @return string The string with the tags escaped
	 */
	function escape_tags($string)
	{
		return str_replace(array('{', '}'), array('&#123;', '&#125;'), $string);
	}

}

if ( ! function_exists('process_data_jmr1'))
{

	// Set PCRE recursion limit to sane value = STACKSIZE / 500 (256KB stack. Win32 Apache or  8MB stack. *nix)
	ini_set('pcre.recursion_limit', (strtolower(substr(PHP_OS, 0, 3)) === 'win' ? '524' : '16777'));

	/**
	 * Process data JMR1
	 *
	 * Minifying final HTML output
	 *
	 * @param string $text The HTML output
	 * @return string  The HTML without white spaces or the input text if its is too big to your SO proccess.
	 * @author Alan Moore, ridgerunner
	 * @author Marcos Coelho <marcos@marcoscoelho.com>
	 * @see http://stackoverflow.com/q/5312349
	 */
	function process_data_jmr1($text = '')
	{
		$re = '%                            # Collapse whitespace everywhere but in blacklisted elements.
        (?>                                 # Match all whitespans other than single space.
          [^\S]\s*                          # Either one [\t\r\n\f\v] and zero or more ws,
          |\s{2,}                           # or two or more consecutive-any-whitespace.
        )				                    # Note: The remaining regex consumes no text at all...
        (?=                                 # Ensure we are not in a blacklist tag.
          [^<]*+                            # Either zero or more non-"<" {normal*}
          (?:                               # Begin {(special normal*)*} construct
            <                               # or a < starting a non-blacklist tag.
            (?!/?(?:textarea|pre|script)\b)
            [^<]*+                          # more non-"<" {normal*}
          )*+                               # Finish "unrolling-the-loop"
          (?:                               # Begin alternation group.
            <                               # Either a blacklist start tag.
            (?>textarea|pre|script)\b
            |\z                             # or end of file.
          )                                 # End alternation group.
        )                                   # If we made it here, we are not in a blacklist tag.
        %Six';

		if (($data = preg_replace($re, ' ', $text)) === null)
		{
			log_message('error', 'PCRE Error! Output of the page "'.uri_string().'" is too big.');

			return $text;
		}

		return $data;
	}

	

}

