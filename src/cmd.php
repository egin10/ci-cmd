<?php
/**
 * @author egin10 <egin066@gmail.com> https://github.com/egin10
 * @license MIT
 * @version 1.0.0
 */

Class Cmd {
    /**
     * Show help commands
     * 
     * @return void
     */
    public function help():void
    {
        echo "\e[37mCommand List                                              | Descriptions\n";
        echo "\e[32mphp cicmd.php add:controller [NameController] \t\t  |\e[35mCreate new controller\n";
        echo "\e[32mphp cicmd.php add:model [NameModel] \t\t\t  |\e[35mCreate new Model\n";
        echo "\e[32mphp cicmd.php run [PORT] \t\t\t\t  |\e[35mRun CI on http://localhost:PORT, default PORT 8000\n";
        return;
    }

    /**
     * Create File for Controllers and Models
     * 
     * @param String $fileName Name of Controller or Model file
     * @param String $content Content of Controller or Model
     * @param String $dir Directory goal
     * @return void
     */
    private function cFile(string $fileName, string $content, string $dir):void
    {
        $file = ucfirst($fileName).".php";
        $handle = fopen($file,'w');
        fwrite($handle,$content);
        fclose($handle);
        rename($file,BASE_DIR."/application/".$dir.'/'.$file);
    }

    /**
     * Create Controller to application/controllers
     * 
     * @param String $name The name of controller
     * @return void
     */
    public function controller(string $name):void
    {
        $dir = "controllers";
        $arrDir = strpos($name, "/") ? explode("/", $name) : "";
        if(is_array($arrDir))
        {
            for($n=0; $n<count($arrDir)-1; $n++)
            {
                $dir .="/".$arrDir[$n];
            }
        }
        $fileName = is_array($arrDir) ? $arrDir[count($arrDir)-1] : $name;
        $content = "<?php\ndefined('BASEPATH') OR exit('No direct script access allowed');\n\nclass ".ucfirst($fileName)." extends CI_Controller {\n\tpublic function __construct()\n\t\t{\n\t\t\tparent::__construct();\n\t\t}\n}";

        if(file_exists(BASE_DIR."/application/".$dir."/".$fileName.".php")){
            echo "\e[31mThe Controller name ".$fileName." exists!\n";
        }else{
            if(!is_dir(BASE_DIR."/application/".$dir)) {
                mkdir(BASE_DIR."/application/".$dir);
            }
            $this->cFile($fileName,$content,$dir);
            echo "\e[32mDone ".ucfirst($fileName)." successful created.\n";
        }
    }

    /**
     * Create Model to application/models
     * 
     * @param String $name The name of model
     * @return void
     */
    public function model(string $name):void
    {
        $dir = "models";
        $arrDir = strpos($name, "/") ? explode("/", $name) : "";
        if(is_array($arrDir))
        {
            for($n=0; $n<count($arrDir)-1; $n++)
            {
                $dir .="/".$arrDir[$n];
            }
        }
        $fileName = is_array($arrDir) ? $arrDir[count($arrDir)-1] : $name;
        $content = "<?php\ndefined('BASEPATH') OR exit('No direct script access allowed');\n\nclass ".ucfirst($name)."_model extends CI_Model {\n\tpublic function __construct()\n\t\t{\n\t\t\tparent::__construct();\n\t\t}\n}";

        if(file_exists(BASE_DIR."/application/".$dir."/".$fileName.".php")){
            echo "\e[31mThe Model name ".$fileName."_model.php exists!\n";
        }else{
            if(!is_dir(BASE_DIR."/application/".$dir)) {
                mkdir(BASE_DIR."/application/".$dir);
            }
            $this->cFile($fileName,$content,$dir);
            echo "\e[32mDone ".ucfirst($name)."_model.php successful created.\n";
        }
    }

    /**
     * Run Server
     * Running Server by php -S localhost:port
     *
     * @param Int $port Port for run server
     * @return void
     */
    public function run(int $port):void
    {   
        echo php_uname()."\n";
        echo "Listening on http://localhost:".$port."\n";
        echo BASE_DIR."\n";
        exec("php -S localhost:".$port);
    }
}