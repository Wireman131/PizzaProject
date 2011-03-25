<?php
/*
	* Index page - contains entire site 
	*
	* Description Long
	*
	* @author			Tony Gaudio, David Sullivan
	* @category   ANM293
	* @package    PizzaProject
	* @version    1
	* @link				git@github.com:Wireman131/PizzaProject
	* @link       git@github.com:teamsullivango/PizzaProject
	* @since      Mar 11, 2011-2011
*/

/*
 * setting the timezone is important: emails are temporal
 */
session_start();
ob_start();
date_default_timezone_set('America/Detroit');

/*
 * @ symbol will supress the errors while we configure the php.ini file 
 * at runtime.
 */
@ini_set('display_errors','Off');
@ini_set('log_errors','On');
@ini_set('max_execution_time', 300);
error_reporting(E_ALL | E_STRICT);

/*
 * I couldn't seem to get php to write to php_errors_log, hence, 
 * the error log is in the project directory
 */
//@ini_set('error_log','errors.log');

/*
 * in order to be able to include other files, regardless of the hosting
 * system, SLASH will be defined so that the same path instructions can
 * be used   
 */
if( PATH_SEPARATOR  == ';' ) define('SLASH','\\');
else define('SLASH','/'); 

/*
 * Get path to the directory where this file is running
 * which should be "Source Files"
 */
define('APP_PATH', realpath(dirname(__FILE__)));

/*
 * establish path to project files, array contains paths to all relevant
 * libraries
 */  
set_include_path('.'.PATH_SEPARATOR.implode(PATH_SEPARATOR, array(
    realpath(APP_PATH . SLASH . 'library' . SLASH . 'SwiftMailer' . SLASH . 'V4.0.6' . SLASH . 'lib' ),
    realpath(APP_PATH)
  )));  


?>
<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php
	include('header.php');
?>
</head>
<body>

<?php 
	include('content.php');
	
?>

</body>
</html>
