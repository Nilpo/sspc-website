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
$page->title       = "St. Stephen Fellowship of Presbyterians";
$page->description = "Where we offer our lives in service to the Lord";
$page->header      = "Christ Is The Rock of Our Salvation";
$page->content  = <<<EOF

<img src="common/pic1.jpg" class="left" alt="Open Heart and Hands" />
<p>
At <i>St. Stephen Fellowship of Presbyterians</i> we believe in living lives of
service to Jesus Christ. Our service is more than music or worship; we are
focused on serving our community and work to enrich and support the lives of
those people in our area who may be in need. We invite you to come and
dedicate your life to Jesus Christ in the service of others. To learn more,
please read about our church's <a href="teams/">ministry teams</a> or
<a href="contact/">contact the church office</a> for more information on how
you can be a part of our mission.
</p>

EOF;

require_once("Blog.class");
$blog = new Blog('000001');
$page->leftcontent = $blog->get_excerpts(3);

$page->rightcontent = <<<EOF

      <!-- HINT: Set any div's class to "box" to encapsulate it in (you guessed it) a box
      <div class="box">
        <h4>Spotlight Event</h4>
        <div class="contentarea">
          <img src="common/bread-and-wine.jpg" class="left" alt="Maunday Thursday" />
          <p>Join us on April 5th for our <a href="calendar/event/000186">Maunday Thursday service</a>.</p>
        </div>
      </div>
      -->
    
      <div>
        <h4>Upcoming Events</h4>
        <div class="contentarea">
          <ul class="linklist">

EOF;

$event = new Data("event");
$sql = "select id,sdate,title from event where sdate>now() order by sdate limit 5;";
$results = $event->db->Execute($sql);
$results = $results->GetAssoc();
foreach ( $results as $key => $val) {
  $ts   = strtotime($val['sdate']." UTC");
  $page->rightcontent .= '            <li>'.gmstrftime("%m-%d-%Y",$ts).' <a href="calendar/event/'.$key.'">'.$val['title'].'</a></li>';
}

$page->rightcontent .= <<<EOF

          </ul>
        </div>
      </div>

      <br /><br />
      <br /><br />
      <br /><br />
      <br /><br />

      <div class="box">
        <div class="contentarea">
          <h4>Service Times</h4>
         <p>
            Sunday 9:30am <br />&nbsp;&nbsp;Contemporary Worship<br /><br />
            Sunday 11:00am <br />&nbsp;&nbsp;Traditional Worship<br /><br />
          </p>
        </div>
      </div>

      <div>
       <center><img src="common/fellowship-of-presbyterians.png" style="border: solid 1px #ffffff;" /></center>
      </div>
EOF;

$page->display();

?>
