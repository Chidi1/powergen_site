<?php
function tickerTape(){
	?>
		<form name="news">
			<textarea class=textareajava name="news2" cols=50 rows=2 wrap=virtual></textarea>
		</form>

		<script language=JavaScript>

		//Typing Text (DHTML) v1 (Sunday, April 15th, 2001)
		//Programmed by: Haitham M. Al-Beik
		//Email: albeik26@hotmail.com
		//Visit http://javascriptkit.com for this script

		var newsText = new Array();
		newsText[0] = "IS YOUR SCHOOL HERE YET? ";
		newsText[1] = "IF NOT, PLEASE GIVE US A SHOUT.";
		newsText[2] = "WE WILL GET YOU ON THE SITE NOW";
		newsText[3] = "CONTACT US ........ THANKS!!"

		var ttloop = 1;    // Repeat forever? (1 = True; 0 = False)
		var tspeed = 320;   // Typing speed in milliseconds (larger number = slower)
		var tdelay = 1000; // Time delay between newsTexts in milliseconds

		// ------------- NO EDITING AFTER THIS LINE ------------- \\
		var dwAText, cnews=0, eline=0, cchar=0, mxText;

		function doNews() {
		  mxText = newsText.length - 1;
		  dwAText = newsText[cnews];
		  setTimeout("addChar()",1000)
		}
		function addNews() {
		  cnews += 1;
		  if (cnews <= mxText) {
			dwAText = newsText[cnews];
			if (dwAText.length != 0) {
			  document.news.news2.value = "";
			  eline = 0;
			  setTimeout("addChar()",tspeed)
			}
		  }
		}
		function addChar() {
		  if (eline!=1) {
			if (cchar != dwAText.length) {
			  nmttxt = ""; for (var k=0; k<=cchar;k++) nmttxt += dwAText.charAt(k);
			  document.news.news2.value = nmttxt;
			  cchar += 1;
			  if (cchar != dwAText.length) document.news.news2.value += "_";
			} else {
			  cchar = 0;
			  eline = 1;
			}
			if (mxText==cnews && eline!=0 && ttloop!=0) {
			  cnews = 0; setTimeout("addNews()",tdelay);
			} else setTimeout("addChar()",tspeed);
		  } else {
			setTimeout("addNews()",tdelay)
		  }
		}

		doNews()
		</script>
	<?
}


function imageSlideShow(){
	?>
	<script language="javascript" valign=top>
		var delay=3500 //set delay in miliseconds
		var curindex=0

		var randomimages=new Array()

			randomimages[0]="banner/1.jpg"
			randomimages[1]="banner/2.jpg"
			randomimages[2]="banner/3.jpg"
			randomimages[3]="banner/4.jpg"

		var preload=new Array()

		for (n=0;n<randomimages.length;n++)
		{
			preload[n]=new Image()
			preload[n].src=randomimages[n]
		}

		document.write('<img name="defaultimage" src="'+randomimages[Math.floor(Math.random()*(randomimages.length))]+'" width=500>')

		function rotateimage()
		{

		if (curindex==(tempindex=Math.floor(Math.random()*(randomimages.length)))){
		curindex=curindex==0? 1 : curindex-1
		}
		else
		curindex=tempindex

			document.images.defaultimage.src=randomimages[curindex]
		}

		setInterval("rotateimage()",delay)

	</script>
<?php
}

function fadeImage($db){
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"> </script>

<script type="text/javascript" src="fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
<?php
	$script_start = '<script type="text/javascript">';

	$script_start .= 'var mygallery=new fadeSlideShow({';
	$script_start .= 'wrapperid: "fadeshow1",';
	$script_start .= 'dimensions: [680, 380],';
	$script_start .= 'imagearray: [';
	
	$max_i = 6;
	for ($i=1; $i <= $max_i; $i++)	{
		$script_mid .= '["./banner/'.$i.'.jpg", "'.$row['url'].'", "", "'.$row['message'].'"],';
	}
	
	$script_end .= '],';
	$script_end .= 'displaymode: {type:"auto", pause:3500, cycles:0, wraparound:false, randomize:false},';
	$script_end .= 'persist: true,';
	$script_end .= 'fadeduration: 1500,';
	//$script_end .= 'descreveal: "peekaboo",';
	$script_end .= 'togglerid: ""';
	$script_end .= '}) ';
	$script_end .= '</script>';

	print $script_start.substr($script_mid, 0, -1).$script_end;
}

function fadeImage2($db){
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"> </script>

<script type="text/javascript" src="fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script> &nbsp; &nbsp; &nbsp;
<?php
	$query = "SELECT banner_id, name, url, message FROM banner ORDER BY banner_id desc LIMIT 5";
	//$query_st = sqlite_query($db, $query);

	$script_start = '<script type="text/javascript">';

	$script_start .= 'var mygallery=new fadeSlideShow({';
	$script_start .= 'wrapperid: "fadeshow1",';
	$script_start .= 'dimensions: [680, 380],';
	$script_start .= 'imagearray: [';
	
	for ($i=0; $row = sqlite_fetch_array($query_st); $i++)	{
		$script_mid .= '["./banner_small/'.$row['banner_id'].'.jpg", "'.$row['url'].'", "", ""],';
	}
	
	$script_end .= '],';
	$script_end .= 'displaymode: {type:"auto", pause:3000, cycles:0, wraparound:false},';
	$script_end .= 'persist: false,';
	$script_end .= 'fadeduration: 1500,';
	$script_end .= 'descreveal: "ondemand",';
	$script_end .= 'togglerid: ""';
	$script_end .= '}) ';
	$script_end .= '</script>';

	print $script_start.substr($script_mid, 0, -1).$script_end;
}

function noRightClick(){	?>
	<script type="text/javascript">
		<!--

		var message="You can NOT right click here"; // Your no right click message here
		var closeWin="0"; // Do you want to close window after message (1 for yes 0 for no)

		// JavaScript by Dave Lauderdale
		// Published at: www.digi-dl.com

		function IE(e) 
		{
			 if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
			 {
				  alert(message); if(closeWin=="1") self.close();
				  return false;
			 }
		}
		function NS(e) 
		{
			 if (document.layers || (document.getElementById && !document.all))
			 {
				  if (e.which==2 || e.which==3)
				  {
					   alert(message); if(closeWin=="1") self.close();
					   return false;
				  }
			 }
		}
		document.onmousedown=IE;document.onmouseup=NS;document.oncontextmenu=new Function("return false");

		//-->
	</script>
	<?php 
}

function addToFavourite(){	?>
	<SCRIPT>
		<!--
		if ((navigator.appVersion.indexOf("MSIE") > 0)
		  && (parseInt(navigator.appVersion) >= 4)) {
			var sText = "<U><SPAN STYLE='color:blue;cursor:hand;'";
			sText += "onclick='window.external.AddFavorite(location.href,";
			sText += "document.title);'>Add this page to your favorites</SPAN></U>";
			document.write(sText);
		}
		//-->
	</SCRIPT>
	<?php 
}

function scriptReader()	{ ?>
	<script type="text/javascript" src="switchcontent.js" >

		/***********************************************
		* Switch Content script- (c) Dynamic Drive (www.dynamicdrive.com)
		* This notice must stay intact for legal use.
		* Visit http://www.dynamicdrive.com/ for full source code
		***********************************************/

	</script>

	<style type="text/css">

		/*Style sheet used for demo. Remove if desired*/
		.handcursor{
			cursor:hand;
			cursor:pointer;
		}

	</style>
	<?php
}

function textHighlight(){	?>
	<script language=JavaScript>
		/*
		 * This is the function that actually highlights a text string by
		 * adding HTML tags before and after all occurrences of the search
		 * term. You can pass your own tags if you'd like, or if the
		 * highlightStartTag or highlightEndTag parameters are omitted or
		 * are empty strings then the default <font> tags will be used.
		 */
		function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag) 
		{
		  // the highlightStartTag and highlightEndTag parameters are optional
		  if ((!highlightStartTag) || (!highlightEndTag)) {
			highlightStartTag = "<font style='color:blue; background-color:yellow;'>";
			highlightEndTag = "</font>";
		  }
		  
		  // find all occurences of the search term in the given text,
		  // and add some "highlight" tags to them (we're not using a
		  // regular expression search, because we want to filter out
		  // matches that occur within HTML tags and script blocks, so
		  // we have to do a little extra validation)
		  var newText = "";
		  var i = -1;
		  var lcSearchTerm = searchTerm.toLowerCase();
		  var lcBodyText = bodyText.toLowerCase();
			
		  while (bodyText.length > 0) {
			i = lcBodyText.indexOf(lcSearchTerm, i+1);
			if (i < 0) {
			  newText += bodyText;
			  bodyText = "";
			} else {
			  // skip anything inside an HTML tag
			  if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
				// skip anything inside a <script> block
				if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) {
				  newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
				  bodyText = bodyText.substr(i + searchTerm.length);
				  lcBodyText = bodyText.toLowerCase();
				  i = -1;
				}
			  }
			}
		  }
		  
		  return newText;
		}


		/*
		 * This is sort of a wrapper function to the doHighlight function.
		 * It takes the searchText that you pass, optionally splits it into
		 * separate words, and transforms the text on the current web page.
		 * Only the "searchText" parameter is required; all other parameters
		 * are optional and can be omitted.
		 */
		function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
		{
		  // if the treatAsPhrase parameter is true, then we should search for 
		  // the entire phrase that was entered; otherwise, we will split the
		  // search string so that each word is searched for and highlighted
		  // individually
		  if (treatAsPhrase) {
			searchArray = [searchText];
		  } else {
			searchArray = searchText.split(" ");
		  }
		  
		  if (!document.body || typeof(document.body.innerHTML) == "undefined") {
			if (warnOnFailure) {
			  alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
			}
			return false;
		  }
		  
		  var bodyText = document.body.innerHTML;
		  for (var i = 0; i < searchArray.length; i++) {
			bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
		  }
		  
		  document.body.innerHTML = bodyText;
		  return true;
		}


		/*
		 * This displays a dialog box that allows a user to enter their own
		 * search terms to highlight on the page, and then passes the search
		 * text or phrase to the highlightSearchTerms function. All parameters
		 * are optional.
		 */
		function searchPrompt(defaultText, treatAsPhrase, textColor, bgColor)
		{
		  // This function prompts the user for any words that should
		  // be highlighted on this web page
		  if (!defaultText) {
			defaultText = "";
		  }
		  
		  // we can optionally use our own highlight tag values
		  if ((!textColor) || (!bgColor)) {
			highlightStartTag = "";
			highlightEndTag = "";
		  } else {
			highlightStartTag = "<font style='color:" + textColor + "; background-color:" + bgColor + ";'>";
			highlightEndTag = "</font>";
		  }
		  
		  if (treatAsPhrase) {
			promptText = "Please enter the phrase you'd like to search for:";
		  } else {
			promptText = "Please enter the words you'd like to search for, separated by spaces:";
		  }
		  
		  searchText = prompt(promptText, defaultText);

		  if (!searchText)  {
			alert("No search terms were entered. Exiting function.");
			return false;
		  }
		  
		  return highlightSearchTerms(searchText, treatAsPhrase, true, highlightStartTag, highlightEndTag);
		}


		/*
		 * This function takes a referer/referrer string and parses it
		 * to determine if it contains any search terms. If it does, the
		 * search terms are passed to the highlightSearchTerms function
		 * so they can be highlighted on the current page.
		 */
		function highlightGoogleSearchTerms(referrer)
		{
		  // This function has only been very lightly tested against
		  // typical Google search URLs. If you wanted the Google search
		  // terms to be automatically highlighted on a page, you could
		  // call the function in the onload event of your <body> tag, 
		  // like this:
		  //   <body onload='highlightGoogleSearchTerms(document.referrer);'>
		  
		  //var referrer = document.referrer;
		  if (!referrer) {
			return false;
		  }
		  
		  var queryPrefix = "q=";
		  var startPos = referrer.toLowerCase().indexOf(queryPrefix);
		  if ((startPos < 0) || (startPos + queryPrefix.length == referrer.length)) {
			return false;
		  }
		  
		  var endPos = referrer.indexOf("&", startPos);
		  if (endPos < 0) {
			endPos = referrer.length;
		  }
		  
		  var queryString = referrer.substring(startPos + queryPrefix.length, endPos);
		  // fix the space characters
		  queryString = queryString.replace(/%20/gi, " ");
		  queryString = queryString.replace(/\+/gi, " ");
		  // remove the quotes (if you're really creative, you could search for the
		  // terms within the quotes as phrases, and everything else as single terms)
		  queryString = queryString.replace(/%22/gi, "");
		  queryString = queryString.replace(/\"/gi, "");
		  
		  return highlightSearchTerms(queryString, false);
		}


		/*
		 * This function is just an easy way to test the highlightGoogleSearchTerms
		 * function.
		 */
		function testHighlightGoogleSearchTerms()
		{
		  var referrerString = "http://www.google.com/search?q=javascript%20highlight&start=0";
		  referrerString = prompt("Test the following referrer string:", referrerString);
		  return highlightGoogleSearchTerms(referrerString);
		}
	</script>
<?php
}
	function cursorChange(){
		?>
		<script language="JavaScript" type="text/javascript">

			/******************************************
			* Cross browser cursor trailer script- By Brian Caputo (bcaputo@icdc.com)
			* Distributed with permission from Brian Caputo by lissaexplains.com
			* Modified Dec 31st, 02' by DD. This notice must stay intact for use
			******************************************/

			A=document.getElementById
			B=document.all;
			C=document.layers;
			T1=new Array("image6.gif",45,45,"image5.gif",45,45,"image4.gif",45,45,"image3.gif",45,45,"image2.gif",45,45,"image1.gif",45,45)

			var offsetx=0 //x offset of trail from mouse pointer
			var offsety=0 //y offset of trail from mouse pointer

			nos=parseInt(T1.length/3)
			rate=50
			ie5fix1=0;
			ie5fix2=0;
			rightedge=B? document.body.clientWidth-T1[1] : window.innerWidth-T1[1]-20
			bottomedge=B? document.body.scrollTop+document.body.clientHeight-T1[2] : window.pageYOffset+window.innerHeight-T1[2]

			for (i=0;i<nos;i++){
			createContainer("CUR"+i,i*10,i*10,i*3+1,i*3+2,"","<img src='"+T1[i*3]+"' width="+T1[(i*3+1)]+" height="+T1[(i*3+2)]+" border=0>")
			}

			function createContainer(N,Xp,Yp,W,H,At,HT,Op,St){
			with (document){
			write((!A && !B) ? "<layer id='"+N+"' left="+Xp+" top="+Yp+" width="+W+" height="+H : "<div id='"+N+"'"+" style='position:absolute;left:"+Xp+"; top:"+Yp+"; width:"+W+"; height:"+H+"; ");
			if(St){
			if (C)
			write(" style='");
			write(St+";' ")
			}
			else write((A || B)?"'":"");
			write((At)? At+">" : ">");
			write((HT) ? HT : "");
			if (!Op)
			closeContainer(N)
			}
			}

			function closeContainer(){
			document.write((A || B)?"</div>":"</layer>")
			}

			function getXpos(N){
			if (A)
			return parseInt(document.getElementById(N).style.left)
			else if (B)
			return parseInt(B[N].style.left)
			else
			return C[N].left
			}

			function getYpos(N){
			if (A)
			return parseInt(document.getElementById(N).style.top)
			else if (B)
			return parseInt(B[N].style.top)
			else
			return C[N].top
			}

			function moveContainer(N,DX,DY){
			c=(A)? document.getElementById(N).style : (B)? B[N].style : (C)? C[N] : "";
			if (!B){
			rightedge=window.innerWidth-T1[1]-20
			bottomedge=window.pageYOffset+window.innerHeight-T1[2]
			}
			c.left=Math.min(rightedge, DX+offsetx);
			c.top=Math.min(bottomedge, DY+offsety);
			}
			function cycle(){
			//if (IE5) 
			if (document.all&&window.print){
			ie5fix1=document.body.scrollLeft;
			ie5fix2=document.body.scrollTop;
			}
			for (i=0;i<(nos-1);i++){
			moveContainer("CUR"+i,getXpos("CUR"+(i+1)),getYpos("CUR"+(i+1)))
			}
			}

			function newPos(e){
			moveContainer("CUR"+(nos-1),(B)?event.clientX+ie5fix1:e.pageX+2,(B)?event.clientY+ie5fix2:e.pageY+2)
			}

			function getedgesIE(){
			rightedge=document.body.clientWidth-T1[1]
			bottomedge=document.body.scrollHeight-T1[2]
			}

			if (B){
			window.onload=getedgesIE
			window.onresize=getedgesIE
			}

			if(document.layers)
			document.captureEvents(Event.MOUSEMOVE)
			document.onmousemove=newPos
			setInterval("cycle()",rate)
		</script>		
		<?
	}
?>