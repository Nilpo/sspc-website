<?
/*
##################################################
#
# Filename..........: $RCSfile: master.inc,v $
# Original Author...: Anthony L. Awtrey
# Version...........: $Revision: 1.11 $
# Last Modified By..: $Author: aawtrey $
# Last Modified.....: $Date: 2005/05/27 01:30:22 $
#
# Copyright 2005 Anthony Awtrey
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
*/

if (
    ereg("xYzZY",$_SERVER['CONTENT_TYPE']) ||
    ereg("Indy Library",$_SERVER['HTTP_USER_AGENT']) ||
    ereg("85.249.139",$_SERVER['HTTP_X_FORWARDED_FOR']) ||
    ereg("85.249.139",$_SERVER['HTTP_PC_REMOTE_ADDR']) ||
    ereg("reportcomment",$_SERVER['HTTP_REFERER']) ||
    ereg("dalloliogm",$_SERVER['HTTP_REFERER']) ||
    ereg("test-puppet",$_SERVER['HTTP_VIA'])
   )
{
  exit;
}

if (
     $_SERVER['REQUEST_METHOD']=='POST' &&
     ( preg_match("/http:\/\/\S*\.ru\//" , $_POST['message'] ) ||
       preg_match("/tripod.com/" , $_POST['message'] ) )
   )
{
  exit;
}

if ( 
     $_SERVER['PATH_INFO'] != ''
   )
{
  $tmp_reg = "/".str_replace('/','\/',$_SERVER['PATH_INFO'])."$/";
  $tmp_url = preg_replace($tmp_reg, '', $_SERVER['REQUEST_URI']);
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: $tmp_url");
  header("Connection: close");
  exit;
}

/*
 * Define the relative URL based on relpath and REQUEST_URI
 */
define("RELPATH",$relpath);
$temp_uri = $_SERVER['SCRIPT_NAME'];
if (ereg("\?",$temp_uri)) { $temp_uri = ereg_replace("\?.*$","",$temp_uri); }
$temp_uri = ereg_replace("index\.php$","",$temp_uri);
$temp_uri = ereg_replace("\/$","",$temp_uri);
$temp_uri = ereg_replace("^\/","",$temp_uri);
$uri_array = explode("/", $temp_uri);
if ( is_file($uri_array[count($uri_array)-1]) ) {
  $relfile = array_pop($uri_array);
  define("RELFILE",$relfile);
}
for ($i = 0; $i < strlen(RELPATH) / 3; $i++ ) {
  array_pop($uri_array);
}
if ( is_array($uri_array) ) {
  $temp_uri = "/" . implode("/",$uri_array) . "/";
  $reluri = str_replace($temp_uri, "", $_SERVER['REQUEST_URI']);
  if ( $reluri == '/' ) { $reluri = "./"; }
  define("RELURI",$reluri);
}

// Set variables based on which server we are on
if ( $_SERVER["SERVER_NAME"] == 'sspch.org' ||
     $_SERVER["SERVER_NAME"] == 'www.sspch.org' ||
     $_SERVER["SERVER_NAME"] == 'ststephenpres.org' ||
     $_SERVER["SERVER_NAME"] == 'www.ststephenpres.org' ||
     $_SERVER["SERVER_NAME"] == 'martyrsrock.com' ||
     $_SERVER["SERVER_NAME"] == 'www.martyrsrock.com' ||
     $_SERVER["SERVER_NAME"] == '216.92.205.7' ) {
  define("ADODB_PATH","/usr/home/awtrey/share/php/adodb/adodb.inc.php");
  define("DB_HOST_NAME","db48c.pair.com");
  define("JPEGTRAN","/usr/local/bin/jpegtran");
} else {
  define("ADODB_PATH","/usr/share/php/adodb/adodb.inc.php");
  define("DB_HOST_NAME","localhost");
  define("JPEGTRAN","/usr/bin/jpegtran");
}
 
// Turn off errors for live site
// ini_set("error_reporting", "E_ALL & ~E_NOTICE & ~E_WARNING"); // no errors

// Does not set session for the HtDig bot
if (!ereg("htdig",$_SERVER['HTTP_USER_AGENT'])) {
  session_start();
}

// Seed the randomizer
srand((double)microtime()*1000000);

/*
 * Bad user blocking
 */
$badaddy = array(
  //'127.0.0.1',     // Loopback test
  //'70.119.191.80', // Home test
  //'66.192.27.146', // Work test
  //'12.72',         // Adlez 2006-07-07
  //'213.171.218.'   // Suspected proxy
  '24.95.227.',      // Brighthouse local
  '72.185.218.'      // Brighthouse virginia
);

for ($i=0; $i<count($badaddy); $i++) {
  if ( ereg("^$badaddy[$i]",$_SERVER['REMOTE_ADDR']) ) {
    sendEmailNotification('Brighthouse may be back at pair');
  }
}

if ( ereg("Opera 8.54",$_SERVER['HTTP_USER_AGENT']) ) {
  sendEmailNotification('Adlez may be back at pair');
}

/*
 * Clean form input
 */
if ( $_SERVER['REQUEST_METHOD']=='POST' ) {
  foreach( $_POST as $key => $val) {
    #global ${$key};
    if (!is_array($val)) {
      $val = stripslashes($val);
      $val = ereg_replace('\\|\\\\','',$val);
      $val = ereg_replace("'","\'",$val);
      $val = str2htmlentity($val);
      $_POST[$key] = $val;
      ${$key}      = $val;
    }
  }
  sendEmailNotification('Someone Posted from ' . $_SERVER['REMOTE_ADDR']);
}

foreach( $_GET as $key => $val) {
  #global ${$key};
  if (!is_array($val)) {
    $val = stripslashes($val);
    $val = ereg_replace('\\|\\\\','',$val);
    $val = ereg_replace("'","\'",$val);
    $val = str2htmlentity($val);
    $_GET[$key] = $val;
    ${$key}     = $val;
  }
}

/*
 * Load / create various functions
 */

require_once("Data.class");
require_once("Page.class");

function sendEmailNotification($subject='Email From Website') {
  include_once('Email.class');
  $email = new Email();
  $email->setTo('tony@awtrey.com');
  $email->setFrom('webmaster@awtrey.com');
  $email->setSubject($subject);
  $email_body  = "This is the session data:\n\n";
  foreach( $_SESSION as $key => $val) {
    $email_body .= '  ' . $key . ': ' . $val . "\n";
  }
  $email_body .= "\n";
  $email_body .= "This is the post data:\n\n";
  foreach( $_POST as $key => $val) {
    $email_body .= '  ' . $key . ': ' . $val . "\n";
  }
  $email_body .= "\n";
  $email_body .= "This is the get data:\n\n";
  foreach( $_GET as $key => $val) {
    $email_body .= '  ' . $key . ': ' . $val . "\n";
  }
  $email_body .= "\n";
  $email_body .= "This is the server, browser and connection information:\n\n";
  foreach( $_SERVER as $key => $val) {
    $email_body .= '  ' . $key . ': ' . $val . "\n";
  }
  $email->setBody($email_body);
  $email->send();
}

function str2htmlentity($string) {
  $string = ereg_replace('"', '&quot;', $string);
  $string = ereg_replace('<', '&lt;',   $string);
  $string = ereg_replace('>', '&gt;',   $string);
  $string = ereg_replace('&', '&amp;',  $string);
  return($string);
}

function htmlentity2str($string) {
  $string = ereg_replace('&quot;', '"', $string);
  $string = ereg_replace('&lt;',   '<', $string);
  $string = ereg_replace('&gt;',   '>', $string);
  $string = ereg_replace('&amp;',  '&', $string);
  return($string);
}

function truncate_string($string,$length='300') {
  if ( strlen($string) > $length ) {
    $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
    return substr($string, 0, $length);
  } else {
    return $string;
  }
}

function redirect($location='') {
  if ( $location == '' ) { $location = RELPATH; }
  header("HTTP/1.1 302 Moved Temporarily");
  header("Location: $location");
  header("Connection: close");
  exit;
}

function login($inLogin,$inPassword) {
  $account = new Data("account");
  if ( $login = $account->return_array("SELECT * FROM account WHERE login='$inLogin' AND password='$inPassword'") )
  {
    $_SESSION['login'] = $login[0]['id'];
    return true;
  } else {
    return false;
  }
}

function logout() {
  if ($_SESSION['login']) {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
  }
}

function crypt_password($password,$type='DES') {
  $saltchars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ./";
  for ($i=0; $i<8; $i++) {
    $salt .= $saltchars[rand(0,strlen($saltchars)-1)];
  }
  if ( $type == 'DES' ) {
    global $CRYPT_STD_DES;
    $CRYPT_STD_DES  = 1;
    $salt = substr($salt, 1, 2);
   } else {
    global $CRYPT_MD5;
    $CRYPT_MD5 = 1;
    $salt =  "\$1\$" . $salt;
  }
  return crypt($password,$salt);
}


/*
 * Just like print_r but returns a string instead echoing to output
 */
function print_readable($pr_var, $pr_ret = false, $pr_level = 0)
{
  $pr_prefix = str_repeat(" ", $pr_level * 4);

  if ((is_array($pr_var)) or (is_object($pr_var))) {
    if ($pr_level == 0) {
      $pr_base = true;
      if (is_array($pr_var)) { $pr_ret = $pr_prefix . "Array\n"; } else { $pr_ret = $pr_prefix . get_class($pr_var) . " Object\n"; }
      $pr_ret .= $pr_prefix . "(\n";
      $pr_level += 1; $pr_prefix = str_repeat(" ", ($pr_level) * 4);
    } else {
      $pr_base = false;
      $pr_level += 1; $pr_prefix = str_repeat(" ", ($pr_level) * 4);
      $pr_ret .= $pr_prefix . "(\n";
      $pr_level += 1; $pr_prefix = str_repeat(" ", ($pr_level) * 4);
    }

    foreach($pr_var as $pr_var_key=>$pr_var_value) {
      $pr_ret .= $pr_prefix . '[' . $pr_var_key . "] => ";
      if (is_array($pr_var_value)) {
        $pr_ret .= "Array\n";
        $pr_ret .= print_readable($pr_var_value, $pr_print, $pr_level);
      } elseif (is_object($pr_var_value)){
        $pr_ret .= get_class($pr_var_value) . " Object\n";
        $pr_ret .= print_readable($pr_var_value, $pr_print, $pr_level);
      } else {
        $pr_ret .= $pr_var_value."\n";
      }
    }
    $pr_level -= 1; $pr_prefix = str_repeat(" ", ($pr_level) * 4);
    $pr_ret .= $pr_prefix . ")\n";
    if ($pr_base = false) $pr_level -= 1;
  }  else {
    $pr_ret = $pr_prefix."$var\n";
  }
  $pr_ret .= "\n";

  if (($level = 0) and ($ret == true)) {
    return($pr_ret);
  } else {
    print($pr_data);
    return($pr_ret);
  }
}

function mp3player( $file ) {
  $result  = '<object'."\n";
  $result .= '  classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'."\n";
  $result .= '  width="200"'."\n";
  $result .= '  height="20"'."\n";
  $result .= '  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" >'."\n";
  $result .= '  <param'."\n";
  $result .= '    name="movie"'."\n";
  $result .= '    value="'.RELPATH.'common/singlemp3player.swf?file='.$file.'&autoStart=false&backColor=c0c0ff&frontColor=ffffff&songVolume=100" />'."\n";
  $result .= '  <param'."\n";
  $result .= '    name="wmode"'."\n";
  $result .= '    value="transparent" />'."\n";
  $result .= '  <embed'."\n";
  $result .= '    wmode="transparent"'."\n";
  $result .= '    width="200"'."\n";
  $result .= '    height="20"'."\n";
  $result .= '    src="'.RELPATH.'common/singlemp3player.swf?file='.$file.'&autoStart=false&backColor=c0c0ff&frontColor=ffffff&songVolume=100"'."\n";
  $result .= '    type="application/x-shockwave-flash"'."\n";
  $result .= '    pluginspage="http://www.macromedia.com/go/getflashplayer" />'."\n";
  $result .= '</object>'."\n";
  return($result);
}

?>
