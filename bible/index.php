<?
/*
##################################################
#
# Filename..........: $RCSfile: bible.php,v $
# Original Author...: Anthony L. Awtrey
# Version...........: $Revision: 0.1 $
# Last Modified By..: $Author: aawtrey $
# Last Modified.....: $Date: 2006/09/19 04:17:55 $
#
# Copyright 2006 Anthony Awtrey
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

$page              = new Page();
$page->template    = "noprimary.tpl";
$page->title       = "Bible Search";
$page->description = "Search and compare various translations of the bible.";
$page->header      = "Bible Search";

$page->content     = <<<EOF

<p>
This search form can take most formats of verses, such as 'Psalms 23',
'Mark 1:1', 'John 2:5-9' or 'Luke 1:1-4,6,9-10'. It can also take most
commonly used abbreviations, such as '1 c 2:3' or 'jn 2'.
</p>

EOF;

$translations = array(
  'kjv' => 'King James Version',
  'niv' => 'New International Version',
  'nrsv' => 'New Revised Standard Version',
  'amp' => 'Amplified Bible',
  'cev' => 'Contemporary English Version',
  'esv' => 'English Standard Version',
  'mkjv' => 'Modern King James Version',
  'msg' => 'The Message',
  'nasb' => 'New American Standard Bible',
  'nkjv' => 'New King James Version',
  'nlt' => 'New Living Translation',
);

if ( $_GET['translation'] ) {
  $translation = $_GET['translation'];
} else {
  $translation = 'niv';
}

require_once('Form.class');
$form = new Form();
$form->text('Enter Bible Verse','verse',$_GET['verse']);
$form->select('Select Translation','translation',$translations,$translation);
$form->submit('submit','Search');
$form->reset('Clear');
$page->content .= $form->render();

if ( isset($_GET['verse']) && $_GET['verse'] != '' ) {
  require_once('Bible.class');
  $bible = new Bible();
  if ( $bible->setTranslation($translation) ) {
    $page->content .= "<h2>".$translations[ $translation ]."</h2>\n";
    $page->content .= $bible->parseVerse($_GET['verse']);
  } else {
    $page->content .= "<h2>Unknown Translation</h2>\n";
    $page->content .= "<p>Unknown translation: ".$translation."</p>\n";
  }
  unset($bible);
}

$page->display();

?>
