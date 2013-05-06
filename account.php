<?
/*
##################################################
#
# $RCSfile: account.php,v $
# Original Author...: Anthony L. Awtrey
# Version...........: $Revision: 1.6 $
# Last Modified By..: $Author: aawtrey $
# Last Modified.....: $Date: 2005/04/18 00:44:05 $
#
# Copyright 2005 Anthony L. Awtrey
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
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
#
*/

$inc_dir = 'include';
while (!is_dir($inc_dir)) {
  $relpath .= '../';
  $inc_dir = $relpath . 'include';
  if ($relpath == '../../../../../') { $relpath=''; break; }
}
$include_path = ':' . $relpath . 'include';
ini_set("include_path", ini_get("include_path").$include_path);
require_once("master.inc");

$goodaddy = array(
  '127.0.0.1',
  '192.168.1.132',
  '97.100.233.7',
  '66.192.110.63',
  '70.119.22.101',
  '72.189.224.101',
  '68.202.204.113'
);

#for ($i=0; $i<count($goodaddy); $i++) {
#  if ( ereg("^$goodaddy[$i]",$_SERVER['REMOTE_ADDR']) ) {
    require_once("Account.class");
    $account = new Account();
    $account->run();
    exit;
#  }
#}

$page              = new Page();
$page->template    = "noprimary.tpl";
$page->title       = "Login";
$page->description = "Login to this site";
$page->header      = "Access Denied";
$page->content     = "<p><b>You are not allowed to log into this site.</b></p>\n";
$page->display();

?>
