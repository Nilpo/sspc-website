<?
/*
##################################################
#
# Filename..........: $RCSfile: index.php,v $
# Original Author...: Anthony L. Awtrey
# Version...........: $Revision: 1.3 $
# Last Modified By..: $Author: aawtrey $
# Last Modified.....: $Date: 2005/04/13 01:35:09 $
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

$inc_dir = 'include';
while (!is_dir($inc_dir)) {
  $relpath .= '../';
  $inc_dir = $relpath . 'include';
  if ($relpath == '../../../../../') { $relpath=''; break; }
}
$include_path = ':' . $relpath . 'include';
ini_set("include_path", ini_get("include_path").$include_path);
require_once("master.inc");

require_once("Album.class");
$album = new Album();
$album->page->title       = "St. Stephen Photo Album";
$album->page->description = "This is the St. Stephen Fellowship of Presbyterians photo album.";
$album->run();

?>
