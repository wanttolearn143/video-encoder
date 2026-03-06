<?php
$url = "https://www.mediafire.com/file_premium/hkpfv6m36ez5ocb/Boyfriend.on.Demand.S01E01.The.Futures.of.You.and.Me.1080p.NF.WEB-DL.AAC5.1.x265-Kotoko.mkv/file";
$tmpFile = "/tmp/Boyfriend.on.Demand.S01E01.mkv";
$output = "output/Boyfriend.on.Demand.S01E01.mkv";

// 1. Download the video first
file_put_contents($tmpFile, fopen($url, 'r'));

// 2. Process with FFmpeg
$cmd = 'ffmpeg -y -i "' . $tmpFile . '" ' .
       '-vf "delogo=x=26:y=98:w=225:h=26:show=0,boxblur=1:1" ' .
       '-r 23.976024 ' .
       '-c:v libx264 -crf 23 -preset veryfast ' .
       '-c:a aac -b:a 192k "' . $output . '"';

exec($cmd, $out, $status);

// 3. Cleanup
unlink($tmpFile);

if ($status === 0) echo "Processed successfully\n";
else echo "Error\n";
