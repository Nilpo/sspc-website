<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>[TITLE]</title>
    <meta name="description" content="[DESCRIPTION]" />
    <meta name="keywords" content="[KEYWORDS]" />
    <meta name="ROBOTS" content="ALL" />
    <meta name="author" content="Anthony L. Awtrey" />
    <link rel="shortcut icon" href="[FAVICON]" />
    <style type="text/css" media="screen">
<!--

* { padding: 0em; margin: 0em; }

body { background: #000000 url('[RELPATH]common/bg1.jpg'); padding: 35px 0px 35px 0px; }
body,input { font-size: 10pt; font-family: "georgia", "times new roman", serif; color: #333333; }
p { line-height: 1.5em; margin-bottom: 1.0em; text-align: justify; }
a { color: #B96D00; text-decoration: underline; }
a:hover { text-decoration: none; } 
h3 span { font-weight: normal; } 
h3,h4 { display: inline; font-weight: bold; background-repeat: no-repeat; background-position: right; }
h3 { font-size: 1.7em; padding-right: 34px; background-image: url('[RELPATH]common/db1.gif'); }
h4 { font-size: 1.2em; padding-right: 28px; background-image: url('[RELPATH]common/db2.gif'); }
img { border: solid 1px #6F5230; }
img.left { position: relative; float: left; margin: 0em 1.8em 1.4em 0em; }
img.right { position: relative; float: right; margin: 0em 0em 1.8em 1.8em; }
ul.linklist { list-style: none; }
ul.linklist li { line-height: 2.0em; } 
blockquote{ border: 1px solid #F0F0F0; margin: 0px 0px 10px 0px; padding: 5px 5px 5px 5px; background: #F6F6F6; }

.contentarea { padding-top: 1.3em; }
.divider1 { position: relative; background: #fff url('[RELPATH]common/border2.gif') repeat-x; height: 14px; margin: 2.0em 0em 1.5em 0em; clear: both; }
.divider2 { position: relative; height: 1px; border-bottom: solid 1px #eaeaea; margin: 2.0em 0em 2.0em 0em; }
.post .details { position: relative; top: -1.5em; font-size: 0.8em; color: #787878; }
.post ul.controls { clear: both; }
.post ul.controls li { display: inline; font-size: 0.8em; }
.post ul.controls li a { background-repeat: no-repeat; background-position: left; padding: 0em 1.0em 0em 20px; }
.post ul.controls li a.printerfriendly { background-image: url('[RELPATH]common/icon-printerfriendly.gif'); }
.post ul.controls li a.comments { background-image: url('[RELPATH]common/icon-comments.gif'); }
.post ul.controls li a.more { background-image: url('[RELPATH]common/icon-more.gif'); }
.box { position: relative; background: #FDFCF6 url('[RELPATH]common/boxbg.gif') repeat-x; left: -1.5em; top: -1.5em; padding: 1.5em; border-bottom: solid 1px #E1D2BD; margin-bottom: 1.0em; }

/*
	The width value below controls the overall width of the design. By default it's set to 82%
	(so it'll take up 82% of the browser window's width). You can set it to a different percentage
	value (70%, 90%, etc.) or even a pixel value (760px, 800px, etc.) to enforce a fixed width.
*/
#outer { z-index: 2; position: relative; width: 82%; border: solid 7px #fff; background-color: #fff; margin: 0 auto; }
#upbg { position: absolute; top: 0px; left: 0px; width: 100%; height: 275px; background: #fff url('[RELPATH]common/bg2.jpg') repeat-x; z-index: 1; }
#header { position: relative; width: 100%; height: 9.0em; background: #2B2B2B url('[RELPATH]common/topbg.gif') repeat-x; margin-bottom: 2px; }
#headercontent { position: absolute; bottom: 0em; padding: 0em 2.0em 1.3em 2.0em; }
#headercontent h1 { font-weight: normal; color: #fff; font-size: 2.5em; }
#headercontent h1 sup { color: #777; }
#headercontent h2 { font-size: 1.0em; font-weight: normal; color: #aaa; }
#search { position: absolute; top: 5.5em; right: 2.0em; padding-right: 0.0em; }
#search input.text { margin-right: 0.5em; vertical-align: middle; border-top: solid 1px #000000; border-right: 0px; border-bottom: solid 1px #777777; border-left: 0px; padding: 0.15em; width: 10.0em; }
#search input.submit { background: #939B00 url('[RELPATH]common/buttonbg.gif') repeat-x; border: solid 1px #5F6800; font-weight: bold; padding: 0.25em; font-size: 0.8em; color: #F2F3DE; vertical-align: middle; }
#headerpic { position: relative; height: 109px; background: #fff url('[RELPATH]common/hdrpic.jpg') no-repeat top left; margin-bottom: 2px; }
#menu { position: relative; background: #7F8400 url('[RELPATH]common/menubg.gif') repeat-x top left; height: 3.5em; padding: 0em 1.0em 0em 1.0em; margin-bottom: 2px; }
#menu ul { position: absolute; top: 1.1em; }
#menu ul li { position: relative; display: inline; }
#menu ul li a { padding: 0.5em 1.0em 0.9em 1.0em; color: #fff; text-decoration: none; }
#menu ul li a:hover { text-decoration: underline; }
#menu ul li a.active { background: #7F8400 url('[RELPATH]common/menuactive.gif') repeat-x top left; }
#menubottom { background: #fff url('[RELPATH]common/border1.gif') repeat-x; height: 14px; margin-bottom: 1.5em; }
#content { padding: 0em 2.0em 0em 2.0em; }
#content ul { margin-left: 2.0em; }
#primarycontainer { float: left; margin-right: -18.0em; width: 100%; }
#primarycontent { margin: 1.5em 22.0em 0em 0em; } 
#secondarycontent { margin-top: 1.5em; float: right; width: 18.0em; }
#footer { position: relative; height: 2.0em; clear: both; padding-top: 5.0em; background: #fff url('[RELPATH]common/border2.gif') repeat-x 0em 2.5em; font-size: 0.8em; }
#footer .left { position: absolute; left: 2.0em; bottom: 1.2em; }
#footer .right { position: absolute; right: 2.0em; bottom: 1.2em; }
#calendar table { width: 100%; border-collapse: collapse; }
#calendar th { width: 14%; text-align: center; color: black; background: #F0F0F0; border: 1px solid #E0E0E0; }
#calendar td { height: 60px; vertical-align: top; padding-left: 5px; padding-bottom: 5px; border: 1px solid #E0E0E0; }
#calendar .date { font-weight: bold; }
#calendar ul { list-style: none; margin-left: 0; padding-left: 1em; text-indent: -1em; }

.center { width: auto; text-align: center; }
.left   { width: auto; float: left; }
.right  { width: auto; text-align: right; }
.leftm  { float: left; margin: 0 15px 4px 0; }
.rightm { float: right; margin: 0 0 4px 15px; }

.comment        { margin:0 0 0 0; padding: 0 0 0 1.5em; width: auto; background: #F6F6F6; }
.comment .left  { width: auto; float: left; font-size: small; }
.comment .right { width: auto; text-align: right; font-size: small; }

.form       { width: auto; padding: 5px 0 10px 0; border-style: dotted; border-color:#C0C0C0; border-width:1px; background: #F6F6F6; }
.row        { width: auto; padding: 5px 0 0 0; }
.row .left  { width: 150px; float: left; text-align: right; }
.row .right { width: auto; margin-left: 20px; text-align: right; }

.graybg  { background: #F0F0F0; }
.box     { font-size: small; background-color: [ACCENT_COLOR]; border: 1px solid #c8c8c8; padding: 2px 5px 2px 8px; margin: 0 0 10px 0 }
.photo   { border:1px solid #f0f0f0; padding:2px; background-color:#ffffff; margin:1px 1px 1px 1px; }
.gray    { color:  #A6A6A6 }
.error   { font-weight: bold; color: red }
.bold    { font-weight: bold; }
.italics { font-weight: bold; }
.small   { font-size: small;  margin-bottom: 0; margin-top: 0}
.little  { font-size: x-small;  margin-bottom: 0; margin-top: 0}
.tiny    { font-size: xx-small;  margin-bottom: 0; margin-top: 0}
.clear   { clear: both; }
.hide    { display: none; }
.red     { color: #FF0000; }

// -->
    </style>

[HEAD]

  </head>
<body>

<div id="upbg"></div>

<div id="outer">


  <div id="header">
    <div id="headercontent">
      <h1>[TITLE]</h1>
      <h2>[DESCRIPTION]</h2>
    </div>
  </div>


  <form method="post" action="">
    <div id="search">
<!--
      <input type="text" class="text" maxlength="64" name="keywords" />
      <input type="submit" class="submit" value="Search" />
-->
    </div>
  </form>


  <div id="headerpic"></div>

  
  <div id="menu">
    <!-- HINT: Set the class of any menu link below to "active" to make it appear active -->
    <ul>
[MENU]
    </ul>
  </div>
  <div id="menubottom"></div>

  
  <div id="content">

    <!-- Normal content: Stuff that's not going to be put in the left or right column. -->
    <div id="topcontent">

      <h3>[HEADER]</h3>
      <div class="contentarea">
        <!-- Normal content area start -->

[CONTENT]

        <!-- Normal content area end -->
      </div>
    </div>
  
  </div>

  <div id="footer">
      <div class="left">&copy; 2012 St. Stephen Fellowship of Presbyterians. All rights reserved.</div>
      <div class="right">[ACCOUNT]</a></div>
  </div>
  
</div>

</body>
</html>
