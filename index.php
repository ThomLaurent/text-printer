<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css">
	</head>
<?php
		const FILE_PATH = "./memory.txt";
		const KEY = "song";
		const FILTERS = " 16 9,(lyrics, in description),__,_Lyrics, ( Lyrics ), (Lyrics), [Lyrics], (lyrics), [lyrics], (with lyrics), + lyrics, lyrics, + Lyrics, Lyrics, (Audio), - High Definition, - HQ Audio, HD, HQ, (HQ), (HD), (HD - 1080p), [PV] , (clip officiel), (Clip Officiel), [Official Audio], (Official Video), [Official Video], (Official Music Video), Official Music Video, (lyrics in description), (Paroles + Traduction), [Animated video], (official video), (Clip Officiel), (clip officiel), [Official Music Video], (OFFICIAL),(1) ,(2) ,(3) ,(4) ,(5) ,(6) ,(7) ,(8) ,(9) ,(10) , (OFFICIAL MUSIC VIDEO),［PV］";

		$size = '36px';

		// Set Song Title
		if (isset($_GET[KEY])) {
			$title = $_GET[KEY];
			$title = str_replace(explode(",", FILTERS), "", $title);
			file_put_contents(FILE_PATH, htmlspecialchars($title));
		}
		
		// Set Font Size
		if (isset($_GET['size'])) {
			$size = $_GET['size'] . 'px';
		}
		
		$size = (isset($_GET['size']) ? $_GET['size'] : '36') . 'px';
		$align = isset($_GET['align']) ? $_GET['align'] : 'left';
		$color = isset($_GET['color']) ? $_GET['color'] : '#cfcfcf';
?>
	<body <?php if (isset($_GET['debug'])) echo "style=\"background-color:black\""; ?>>
		<p id="song" <?php echo "style=\"font-size:$size; text-align:$align; color:$color;\""; ?>></p>
	</body>
	
	<script>
(function() {	

const FILE = "/memory.txt";
var elmt = document.getElementById('song');

setInterval(refreshContent, 1500);
refreshContent();

function refreshContent() {
	elmt.innerHTML = readFile(FILE);
}

function readFile(filePath) {
	var result = null;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", filePath, false);
	xmlhttp.send();
	if (xmlhttp.status==200) {
		result = xmlhttp.responseText;
	}
	return result;
}

})();
	</script>
</html>