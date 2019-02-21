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
        echo "\e[33mCommand List                                              | Descriptions\n";
        echo "\e[32mphp cicmd.php add:controller [NameController] \t\t  |\e[35mCreate new controller\n";
        echo "\e[32mphp cicmd.php add:model [NameModel] \t\t\t  |\e[35mCreate new Model\n";
        echo "\e[32mphp cicmd.php run [PORT] \t\t\t\t  |\e[35mRun CI on http://localhost:PORT\n";
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
        $handle = fopen($fileName,'w');
        fwrite($handle,$content);
        fclose($handle);
        rename($fileName,'application/'.$dir.'/'.$fileName);
    }

    /**
     * Create Controller to application/controllers
     * 
     * @param String $name The name of controller
     * @return void
     */
    public function controller(string $name):void
    {
        echo "\e[32mDone ".ucfirst($name)." successful created.\n";
    }

    /**
     * Create Model to application/models
     * 
     * @param String $name The name of model
     * @return void
     */
    public function model(string $name):void
    {
        echo "\e[32mDone ".ucfirst($name)."_model.php successful created.\n";
    }
}