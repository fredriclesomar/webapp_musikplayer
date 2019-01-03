<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!-- Visitman css -->
<style type="text/css">
        *{margin:0; padding:0;}
		.article {background-color: #11e5a5; text-align: center; padding: 20px 0;}
    </style>
<!-- End visitman :P -->

<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" href="/css/mules.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title id="pageTitle">Music Player</title>
		<link rel="icon" href="/ikon/image.gif" type="image/gif" />
		<link href="player.css" type="text/css" rel="stylesheet"/>
        <link rel="manifest" href="manifest.webmanifest"> <!-- Manifest -->
		<script src="playlist.php" type="application/javascript" charset="UTF-8"></script>
		<script src="player.js" type="application/javascript" charset="UTF-8"></script>
        <script src="script.js" defer></script>

	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>		   
   	  <ul class="w3-ul w3-card-4">
    <li class="w3-bar">
 <img src="img_avatar2.png" class="w3-bar-item w3-circle w3-hide-small" style="width:90px">
      <div class="w3-bar-item">
        <span class="w3-large">Music Player</span><br>
        <span>Online</span>
      </div>
    </li>
  </ul>
<!--
<div class="w3-container w3-center w3-animate-zoom">  Animasi :P -->
<div class="w3-container">
 <font size="14" color="white">Quote the day</font> 
  <div class="w3-panel w3-black">
    <p class="w3-large w3-serif">
    <i class="fa fa-quote-right w3-xxlarge xw3-margin-right"></i>Tidak ada seorangpun yang dapat merubah 'orang itu', tetapi seseorang bisa menjadi alasan 'orang itu' untuk berubah.   ~Spongebob Squarepants</p>
  </div>
</div>

<!-- Antitheff :P -->

<script type='text/javascript'>
//<![CDATA[
function redirectCU(e) {
  if (e.ctrlKey && e.which == 85) {
    window.location.replace("#MakanBang");
    return false;
  }
}
document.onkeydown = redirectCU;

//Script Redirect Klik Kanan
function redirectKK(e) {
  if (e.which == 3) {
    window.location.replace("#MakanBang");
    return false;
  }
}
document.oncontextmenu = redirectKK;
//]]>
</script>
</body>
	<body onload="init();">
		<div id="player">
			<img id="cover" alt="&#127925;"/>
			<div id="ctrl">
				<h4 id="title"></h4>
				<input id="back" type="button" value="|&#x25c0;&#x25c0;"/>
				<input id="next" type="button" value="&#9654;&#9654;|"/><br/>
				<input id="wipe" type="button" value="Clear Played List">
			</div>
			<div id="id3">
				Title: <span id="id3_title"></span><br/>
				Artist: <span id="id3_artist"></span><br/>
				Album: <span id="id3_album"></span><br class="year"/>
				<span class="year">Year:</span> <span id="id3_year" class="year"></span>
			</div>
			<audio id="audio" controlsList="nodownload" autoplay>This is your browser speaking, I don't support HTML5 cause I am too old to learn new tricks.</audio>

			<div id="audioUI">
				<span id="playPause"></span>
				<input id="current" type="range" min="0" max="1" step="0.00000001"/>
				<span><span id="time"></span> / <span id="length"></span>&nbsp;</span>
				<span id="mute" title="Mute"></span>
				<input id="volume" type="range" min="0" max="1" step="0.01"/>
			</div>
			<p id="error" title="Click to hide"></p>
			<div id="opts">
				<div><span>Shuffle: <input id="shuffle" type="checkbox"/></span></div>
				<div><span>Repeat: <input id="repeat" type="checkbox"/></span></div>
				<div><span>Loop: <input id="loop" type="checkbox"/></span></div>
			</div>
		</div>
		<br/>
		<div id="tab_container" class="playlist">
			<div id="tabs">
				<div class="playlist">Library</div>
				<div class="find">Search</div>
				<div class="hst">History</div>
			</div>
			<span>
				<span>Track </span><span>Action: </span><select id="action">
					<option>Play</option>
					<option>Enqueue</option><!-- And here was was thinking eqeue was hard to spell! -->
				</select>
			</span>
			<div id="tab_content">
				<div id="playlist"></div>
				<div id="find">
					<form action="#" name="search">
						Find: <input type="text" name="str"/>
						<span><input type="checkbox" name="case"/><span onclick="this.previousSibling.click()"> Case Sensitive</span></span>
						<br/>
						Match <select name="match"/>
							<option value="name">File Name</option>
							<option value="path">Full Path</option>
				<!--			<option value="path">Full Path</option> Penambahan Genre-->
						</select>
						<input type="submit" value="Find"/>
					</form>
					<hr/>
					<ul id="search"></ul>
				</div>
				<div id="hst">
					Current loaded track: <span id="index"></span>
					<ol id="queue"></ol>
				</div>
			</div>
		</div>

		<article>
            Ente pengunjung ke:
            <?php 
            include ("vst.php");
            echo "<p style='color:red; font-weight:enchant_broker_list_dicts(broker)'> $kunjungan[0]x</p>";
            ?>
        </article>	

		<!--<br/><div id="debugHst"></div>-->

            <hr>
				<center>
                    <div class="row" id="footer">
                        <div class="col-md-12 text-center">
                            <p class="copyright-text">Powered By Fredric Lesomar</p>
                        </div>
                    </div>
				</center>

	<!-- Demo content 	-->		
	<div id="demo-content">

		<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>



	</div>


			<!-- /Demo content -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	
	  <script>
// Register the service worker
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('fredricsw.js').then(function(registration) {
    // Registration was successful
    console.log('ServiceWorker registration successful with scope: ', registration.scope);
}).catch(function(err) {
    // registration failed :(
    	console.log('ServiceWorker registration failed: ', err);
    });
}
</script>
		</body>
</html>
