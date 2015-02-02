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
$page->title       = "Services";
$page->description = "Being in service to God and each other";
$page->header      = "Services are more than worship";
$page->content     = <<<EOF
<img src="../common/worship.jpg" class="left" style="border: none;" alt="Worshiping God" />
<p>
Please make plans to attend a worship service with us, but also plan to 
feel invigorated when you leave and ready to serve in some of the other 
ways we are called in service to our world.
</p>
EOF;
$page->leftcontent     = <<<EOF

       <div class="divider2"></div>
        <div class="post">
          <h4>Contemporary Worship Service</h4>
          <div class="contentarea">
            <p>Our contemporary service provides a free form service supported by our praise team Renewed. It focuses on the praise and worship of God through modern songs. Child care is provided and older children are welcome to participate in Kidz Klub.</p>
          </div>
        </div>

        <div class="post">
          <h4>Traditional Worship Service</h4>
          <div class="contentarea">
            <p>Our traditional service provides a structured service with a wide range of musical styles; from choral anthems, gospel songs and other special music. It also includes corporate readings and traditional communal forms such as the Lord's Prayer spoken in unison. Child care is provided and older children are welcome to participate in Kidz Klub.</p>
          </div>
        </div>

       <div class="divider2"></div>

EOF;
$page->rightcontent     = <<<EOF
      <div>

        <h4>Weekly Events</h4>
        <div class="contentarea">
          <p>
            Sunday 9:30am <br />&nbsp;&nbsp;Contemporary Worship<br /><br />
            Sunday 10:30am <br />&nbsp;&nbsp;Kids Bible Encounter<br /><br />
            Sunday 11:00am <br />&nbsp;&nbsp;Traditional Worship<br /><br />
            Thursday 7:00pm <br />&nbsp;&nbsp;Choir Rehearsal
          </p>
        </div>

        <h4>Monthly Events</h4>
        <div class="contentarea">
          <p>
            3rd Wednesday <br />&nbsp;&nbsp;Prayer Warriors
          </p>
        </div>

      </div>
EOF;
$page->display();

?>
