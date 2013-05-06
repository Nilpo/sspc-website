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
$page->title       = "Calendar";
$page->description = "Calendar of events";

require_once("Calendar.class");
require_once("Event.class");

if ( $_GET['year'] ) {
  $year = $_GET['year'];
} else {
  $year = gmstrftime("%Y", gmmktime());
}

if ( $_GET['month'] ) {
  $month = $_GET['month'];
} else {
  $month = gmstrftime('%m', gmmktime());
}

$c = new Calendar($year,$month);
$page->header      = $c->get_title();

function get_first_sunday($year,$month) {
  $dow  = intval(gmstrftime("%w", gmmktime(11,0,0,$month,1,$year)));
  if ( $dow == 0 ) { $dow = 7; }
  $delta = 7 - $dow;
  return(intval(gmstrftime("%d",gmmktime(11,0,0,$month,1+$delta,$year))));
}

function get_last_dom($year,$month) {
  return(intval(gmstrftime("%d",gmmktime(0,0,0,$month+1,0,$year))));
}

$first_sunday = get_first_sunday($year,$month);
$last_day = get_last_dom($year,$month);

# Add 7:30pm Thusday night spanish bible study
for ( $i = $first_sunday; $i <= $last_day; $i = $i+7 ) {
  $ts = intval(gmmktime(9,30,0,$month,$i,$year));
  $c->set_appt('Contemporary Worship',gmstrftime('%Y',$ts),gmstrftime('%m',$ts),gmstrftime('%d',$ts),gmstrftime('%H',$ts),gmstrftime('%M',$ts));
  $ts = intval(gmmktime(11,0,0,$month,$i,$year));
  $c->set_appt('Traditional Worship',gmstrftime('%Y',$ts),gmstrftime('%m',$ts),gmstrftime('%d',$ts),gmstrftime('%H',$ts),gmstrftime('%M',$ts));
  if ($year >= "2011" && $month >= "03" ) {
    $ts = intval(gmmktime(14,0,0,$month,$i,$year));
    $c->set_appt('Servicio Hispano',gmstrftime('%Y',$ts),gmstrftime('%m',$ts),gmstrftime('%d',$ts),gmstrftime('%H',$ts),gmstrftime('%M',$ts));
  }
}

$event = new Data("event");
$sql = "SELECT id,sdate,title FROM event WHERE EXTRACT(YEAR FROM sdate)='".$year."' AND EXTRACT(MONTH FROM sdate)='".$month."'\n";
$results = $event->db->Execute($sql);
$results = $results->GetAssoc();
foreach ( $results as $key => $val) {
  $ts   = strtotime($val['sdate']." UTC");
  $link = '<a href="event/'.$val['id'].'">'.$val['title'].'</a>';
  $c->set_appt($link,gmstrftime('%Y',$ts),gmstrftime('%m',$ts),gmstrftime('%d',$ts),gmstrftime('%H',$ts),gmstrftime('%M',$ts));
}
 
if ( $month == 1 ) {
  $prev_month = 12;
  $prev_year = $year - 1; 
  $next_month = 2;
  $next_year = $year;
} elseif ( $month == 12 ) {
  $prev_month = 11;
  $prev_year = $year;
  $next_month = 1;
  $next_year = $year + 1;
} else {
  $prev_month = $month - 1;
  $prev_year = $year;
  $next_month = $month + 1;
  $next_year = $year;
}

$page->content .= '<div class="graybg small">'."\n";
$page->content .= '  <div class="left"><a href="?year='.$prev_year.'&month='.$prev_month.'">[Previous]</a></div>'."\n";
$page->content .= '  <div class="right"><a href="?year='.$next_year.'&month='.$next_month.'">[Next]</a></div>'."\n";
$page->content .= '</div>'."\n";
$page->content .= $c->render($c->year,$c->month);
$page->content .= '<div class="graybg small">'."\n";
$page->content .= '  <div class="left"><a href="?year='.$prev_year.'&month='.$prev_month.'">[Previous]</a></div>'."\n";
$page->content .= '  <div class="right"><a href="?year='.$next_year.'&month='.$next_month.'">[Next]</a></div>'."\n";
$page->content .= '</div>'."\n";
if ( $_SESSION['login'] ) {
  $page->content .= "<div class=\"graybg small\">\n";
  $page->content .= "[<a href=\"event/index.php?action=add\">Add an Event</a>]\n";
  $page->content .= "</div>\n";
}

$page->display();

?>
