<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2010, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Number Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/number_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
 *
 * @access	public
 * @param	mixed	// will be cast as int
 * @return	string
 */
if ( ! function_exists('byte_format'))
{
	function byte_format($num)
	{
		$CI =& get_instance();

		if ($num >= 1000000000000)
		{
			$num = round($num / 1099511627776, 1);
			$unit = T_('terabyte_abbr');
		}
		elseif ($num >= 1000000000)
		{
			$num = round($num / 1073741824, 1);
			$unit = T_('gigabyte_abbr');
		}
		elseif ($num >= 1000000)
		{
			$num = round($num / 1048576, 1);
			$unit = T_('megabyte_abbr');
		}
		elseif ($num >= 1000)
		{
			$num = round($num / 1024, 1);
			$unit = T_('kilobyte_abbr');
		}
		else
		{
			$unit = T_('bytes');
			return number_format($num).' '.$unit;
		}

		return number_format($num, 1).' '.$unit;
	}
}

/* End of file number_helper.php */
/* Location: ./system/helpers/number_helper.php */