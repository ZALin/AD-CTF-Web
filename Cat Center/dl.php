<?php
@error_reporting(E_ALL ^ E_NOTICE);
require('config.php');

function download($file) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

if ($_REQUEST['mod'] === 'dl') {
    $file = $_REQUEST['file'];
    if(strstr($file, '..') || strstr($file, '/')) {
        die("Please Leave Here!<br/>") ;
    }

    $file = $resource_dir."/{$file}";
    if(!file_exists($file) || !is_file($file)) {
        die("File Not Find!<br/>");
    }

    download($file);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cat Download Center</title>
    
	<style type="text/css">
	body {
		margin: 0;
		background: url('bg.gif');
		font-family: Helvetica, Arial, sans-serif;
		color: white; 
	}
	.container {
	    background: rgba(154, 154, 154, 0.9);
	    padding: 1rem;
	    margin: 1rem;
	}
	</style>
</head>
<body>
    <h1>Cat Download System</h1>

    <div class="container">
        <ul>
<?php
        foreach(scandir($resource_dir) as $file):
            if (strstr($file, '.jpg')):
?>
            <li><a href="?mod=dl&file=<?=$file?>"><?=$file?></a></li>
<?php
            elseif (!strstr($file, '.jpg') && strstr($file, 'flag')):
?>
            <!-- <?=$file?> -->
<?php
            endif;
        endforeach;
?>
        </ul>
    </div>

</body>
</html>