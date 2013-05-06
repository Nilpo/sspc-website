<?
/*
##################################################
#
# Filename..........: $RCSfile: template.php,v $
# Original Author...: Anthony L. Awtrey
# Version...........: $Revision: 1.1 $
# Last Modified By..: $Author: aawtrey $
# Last Modified.....: $Date: 2005/04/07 04:17:55 $
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

$page              = new Page();
$page->template    = "noprimary.tpl";
$page->title       = "Teams";
$page->description = "Ministry teams doing the work of the church";
$page->header      = "Teams";
$page->content     = <<<EOF

<p>
St. Stephen Fellowship of Presbyterians has several ministry teams that focus on integral spiritual, social and developmental areas for both the congregation, community and the church property.  Briefly described below are the goals for each ministry team. 
</p>

<p>
<u>CONGREGATIONAL CARE</u> provides the traditional care for church members through visitations, senior luncheons and personal attention to those in need of an uplifting message, a friendly smile or an attentive ear.
</p>

<p>
<u>FELLOWSHIP</u> supports church activities for church members to include all events and functions such as regularly hosting our monthly fellowship luncheons.  This ministry also provides new member support and maintains kitchen and nursery supplies.  
</p>

<p>
<u>DISCIPLESHIP</u> oversees Christian Education at St. Stephen, to include the Sunday School curriculum, Kidz Klub, nursery, youth and children’s programs, vacation bible school and the church library.  This team would love to help you find your place to serve, as well as a place to nurture your faith alongside other followers of Christ.
</p>

<p>
<u>FACILITIES</u> oversees maintenance of all physical property for St. Stephen and the Weekday School.
</p>

<p>
<u>FINANCE</u> prepares and maintains the annual budget and works closely with the Pastor and staff.  They oversee the church’s financial software in addition to facilities and personnel costs.
</p>

<p>
<u>MEDIA</u> oversees internal and external communication through various media whether it is through our bulletin, signs, website, newsletters, and telephone or event promotions.
</p>

<p>
<u>OUTREACH</u> provides mission outreach both locally and globally. We are deeply committed to serving the community and regularly open our Food Pantry to those in need.
</p>

<p>
<u>WORSHIP and MUSIC</u> oversees the planning and scheduling of all worship and music activities.  The worship team creates weekly worship experiences in styles ranging from traditional to contemporary.
</p>

EOF;
// $page->leftcontent     = <<<EOF
// EOF;
// $page->rightcontent     = <<<EOF
// EOF;
$page->display();

?>
