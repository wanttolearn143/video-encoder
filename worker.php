<?php
$url = "https://www.mediafire.com/file_premium/hkpfv6m36ez5ocb/Boyfriend.on.Demand.S01E01.The.Futures.of.You.and.Me.1080p.NF.WEB-DL.AAC5.1.x265-Kotoko.mkv/file";
$tmpFile = "/tmp/Boyfriend.on.Demand.S01E01.mkv";
$outputFile = "/app/output/Boyfriend.on.Demand.S01E01.mkv";

// Use curl to follow redirects
$ch = curl_init($url);
$fp = fopen($tmpFile, 'w');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // skip SSL verification if needed
curl_exec($ch);
curl_close($ch);
fclose($fp);

// Now run FFmpeg
$cmd = 'ffmpeg -y -i "' . $tmpFile . '" -vf "delogo=x=26:y=98:w=225:h=26:show=0,boxblur=1:1" -r 23.976024 -c:v libx264 -crf 23 -preset veryfast -c:a aac -b:a 192k "' . $outputFile . '"';
exec($cmd, $out, $status);
