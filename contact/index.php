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
//$page->template    = "noprimary.tpl";
$page->title       = "Contact";
$page->description = "Contact information for the church and key personnel";
$page->header      = "St. Stephen Fellowship of Presbyterians";
$page->content     = <<<EOF


<p>
8601 Lake Underhill Rd<br />
Orlando, FL 32825<br />
Phone: (407) 277-4351<br />
Email: <a href="mailto:sspcorlando@gmail.com">sspcorlando@gmail.com</a><br />
</p>

<center>
<img src="../common/map_to_church.png" alt="Map to church" /><br />
<!-- <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;q=8601+Lake+Underhill+Road,+Orlando,+Florida+32825&amp;sll=37.0625,-95.677068&amp;sspn=105.469684,107.226562&amp;ie=UTF8&amp;om=1&amp;ll=28.552183,-81.260118&amp;spn=0.006466,0.013797&amp;t=h&amp;z=14&amp;layer=c&amp;cbll=28.539179,-81.264502&amp;panoid=3R5251JKcIAuHreUjw4CxA&amp;cbp=12,3.79,,1,5&amp;source=embed">View Larger Map</a> -->
<a href="http://maps.google.com/maps?f=q&hl=en&q=8601+Lake+Underhill+Road,+Orlando,+Florida+32825&sll=37.0625,-95.677068&sspn=105.469684,107.226562&ie=UTF8&z=16&iwloc=addr&om=1">Directions to the Church</a><br />
</center>

EOF;

require_once('Table.class');
$t = new Table();
$t->add_headers( array('Position','Name','Phone','Email') );

$t->add_cell('Pastor');
$t->add_cell('Rev. Dr. Thomas Evans (a.k.a. Pastor Tom)');
$t->add_cell('(407) 277-4351');
$t->add_cell('<a href="mailto:pastor@sspch.org">pastor@sspch.org</a>');
$t->add_row();

$t->add_cell('Director of Music');
$t->add_cell('Jill Heckert');
$t->add_cell('(407) 496-1289');
$t->add_cell('<a href="mailto:music@sspch.org">music@sspch.org</a>');
$t->add_row();

$t->add_cell('Clerk of Session');
$t->add_cell('Joyce Kuhn');
$t->add_cell('(407) 277-4351');
$t->add_cell('<a href="mailto:clerk@sspch.org">clerk@sspch.org</a>');
$t->add_row();
$contacts = $t->render();


$page->leftcontent     = <<<EOF

        <div class="post"> 
          <h4>Staff Contacts</h4> 
          <div class="contentarea"> 
          $contacts
          </div> 
        </div> 

EOF;

$page->rightcontent = <<<EOF

      <div>
        <h4>Office Hours</h4>
        <div class="contentarea">
          <ul class="linklist">
            <li>Monday - Thursday<br />9 a.m. - 4 p.m.</li>
          </ul>
        </div>
      </div>

EOF;

$page->display();

?>
