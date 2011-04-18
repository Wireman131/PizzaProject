<?php
/*
 * Short Description
 * 
 * Long Description
 * 
 * @author		Tony Gaudio David Sullivan
 * @category	Category
 * @package		Package
 * @subpackage	Part
 * @version		$ID:$
 * @link		
 * @since		 
 * 
 */


if (!isset($_REQUEST['pid'])) include("order.inc.php");
				else { 
				$_REQUEST['pid'] = str_replace(array('.', '/'), '', $_REQUEST['pid']); 
				
				$content = $_REQUEST['pid']; 
				$nextpage = $content . ".inc.php";

				if (file_exists($nextpage)) { // check to see if include file exists.  If not, show home.inc.php
					//echo $nextpage;
				  include($nextpage);
				} else { 
				  include("order.inc.php");
				}
					
			} 
?>
