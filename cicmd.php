<?php
/**
 * @author egin10 <egin066@gmail.com> https://github.com/egin10
 * @license MIT
 * @version 1.0.0
 */

require_once("src/cmd.php");
$cmd = new Cmd;

if(isset($argv[1]))
{
    switch($argv[1])
    {
        case 'help':
            $cmd->help();
            break;

        case 'add:controller':
            if(isset($argv[2]))
            {
                $cmd->controller($argv[2]);
            }else{
                echo "\e[31mPlease add Controller name!\n";
                $cmd->help();
            }
            break;
            
        case 'add:model':
            if(isset($argv[2]))
            {
                $cmd->model($argv[2]);
            }else{
                echo "\e[31mPlease add Model name!\n";
                $cmd->help();
            }
            break;
        case 'run':
            if(isset($argv[2]))
            {
                $cmd->run($argv[2]);
            }else {
                $cmd->run(8000);
            }
            break;
    }
}else{
    $cmd->help();
}
unset($cmd);