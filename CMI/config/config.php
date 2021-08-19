<?php
$bad_list = [
	'&', '|', ' ', ';', '\t', '"', '\'', '\\', '/', '`', '$', '*', '(', ')', '{', '}', ',', '>', '-', 'config', 'index.php', 
	'nc', 'sh', 'cp', 'touch', 'mv', 'rm', 'ps', 'top', 'sleep', 'sed',
    'apt', 'yum', 'curl', 'wget', 'perl', 'python', 'zip', 'tar', 'ruby',
    'passwd', 'shadow', 'root',
    'dir', 'dd', 'df', 'du', 'free', 'tempfile', 'touch', 'tee', 'sha', 'x64',
    'xargs', 'PATH',
    '$0', 'proc'];


$PATH = getcwd() . '/bin';

putenv('HOME=');
putenv("PATH={$PATH}");

function write_log($log_data) {
    file_put_contents('/tmp/myping.log', json_encode([time(), $_SERVER['HTTP_X_REAL_IP'] ?: $_SERVER['REMOTE_ADDR'], $log_data])."\n", FILE_APPEND);
}

?>