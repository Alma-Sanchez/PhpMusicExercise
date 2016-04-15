<!DOCTYPE html>
<html>
	<!--
	ALma Sanchez Music Lab
	-->
	<head>
		<title>Music Viewer</title>
		<meta charset="utf-8" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<h1>My Music Page</h1>

		<!-- Number of Songs (Variables) -->
		<p>
			I love music.
			<?
				$numberOfSongs = 5678;
				$numberOfHours = $numberOfSongs / 10;
				echo "I have $numberOfSongs total songs, which is over $numberOfHours hours of music!"
			?>
		</p>

		<!-- Music Results Pages (Loops) -->
		<div class="section">
			<h2>Google's Music Results</h2>

			<ol>
				<?php
					for($i=0; $i<5; $i++){
						$start = $i * 10;
						$page = $i+1;
						echo "<li><a href='https://www.google.com/search?tbm=nws&amp;q=Music&amp;start=$start'>Page $page </a></li>";
					}
				?>
			</ol>
		</div>

		<!-- Favorite Artists (Arrays) -->
		<!-- Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
			<?php
				// Using a file instead of array
				$artistFile = file("favorite.txt");
				$length = count($artistFile);
				for($i=0; $i<$length; $i++){
					// echo $i."<br>";
					$linkName = $artistFile[$i];
					$splitThis = strtolower($linkName);
					$urlName = explode(" ", $splitThis);
					$artistsURL = implode("-",$urlName);
					echo "<li><a href='https://www.vevo.com/artist/$artistsURL'>$linkName</a></li>";
					// echo "last ".$i."<br>";
				}
			?>
			</ol>
		</div>

		<!-- Music (Multiple Files) -->
		<!-- MP3 Formatting -->

		<div class="section">
			<h2>My Music and Playlists</h2>
			<ol>
					<?php
					foreach (glob("songs/*.mp3") as $filename) {
						$actualFileName = explode("/", $filename);
						$size = round(filesize($filename) / 1000000, 2);
						echo "<li class='mp3item'><a href='$filename'>$actualFileName[1] ($size GB)</a></li>";
						echo "<li class = 'mp3item'><audio controls><source src='$filename' type='audio/mpeg'></audio></li>";
					}
					?>
			</ol>

				<!-- Exercise 8: Playlists (Files) -->
				<!-- <li class="playlistitem">154-mix.m3u:
					<ul>
						<li>Hello.mp3</li>
						<li>Be More.mp3</li>
						<li>Drift Away.mp3</li>
						<li>Panda Sneeze.mp3</li>
					</ul>
				</li>
			</ul> -->
		</div>
	</body>
</html>
