# CI CMD

Command helper for creating new Controller and Model in CodeIgniter

## Installation

1. Clone this repo to your project directory `git clone https://github.com/egin10/ci-cmd.git`
2. Copy file `cicmd.php` and directory `src` to your project directory. It will look like below :

```
Project
    -application
    -system
    -user_guide
    .editorconfig
    .gitignore
    composer.json
    contributing.md
    index.php
    license.txt
    readme.rst
    -src
    cicmd.php
```

3. Run command with `php cicmd.php help` to show all available command lits.

## Command List

#### Run Service

    php cicmd.php
    php cicmd.php help

The command above will display a list of available commands.

#### Add Controller

    php cicmd.php add:controller ControllerName

The above command is used to create a new controller. the name of the controller may start with a capital letter or lowercase letter, when the controller is successfully created, the controller file name will automatically begin with a capital letter.

The controller name argument can only be the name of the controller file you want to create, it can also be the location and file name of the controller to be created.

    php cicmd.php add:controller Controllername
    php cicmd.php add:controller controllername

The command above will produce a controller file with a file name that starts with a capital letter and will by default be in the `application/controllers/` directory. then the controller will be in `application/controllers/Controllername.php`.

    php add cicmd.php:controller path/Controllername
    php add cicmd.php:controller path/controllername

The command above will generate a controller file and create a new directory with the name `path` in the `application/controllers/` directory and will contain the controller file with the file name `Controllername.php`. then the controller will be in `application/controllers/path/Controllername.php`. the `/` becomes a separator, the word at the end of `/` will be the Controllername. path can be more than one, for example :

    php add cicmd.php:controller path/path/controllername

It will generate a controller in `application/controllers/path/path/Controllername.php`.

#### Add Model

    php cicmd.php add:model ModelName

The above command is used to create a new model. the model name may begin with a capital letter or lowercase letter, when the model is successfully created, the model file name will automatically begin with a capital letter.

The model name argument can only be the file name of the model you want to create, it can also be the location and file name of the model to be created.

    php cicmd.php add:model namemodel
    php cicmd.php add:model namemodel

The command above will generate a model file with file names beginning with capital letters and will by default be in the `application/models/` directory. then the model will be in `application/models/Modelname.php`.

    php add cicmd.php:model path/Modelname
    php cicmd.php add:model path/modelname

The command above will generate a model file and create a new directory with the name `path` in the directory `application/models/` and will contain the model file with the file name `Modelname.php`. Then the model will be in `application/models/path/Modelname.php`.
The `/` becomes a separator, the word at the end of `/` will be Modelname. path can be more than one, for example
php cicmd.php add: model path/path/modelname

it will produce a model in `application/models/path/path/Modelname.php`.

#### Run Service

    php cicmd.php run PORT

The command above will run the service with the `php -S localhost:port` command. ports can be given or not. by default if it does not specify a port it will be a `8000` port. then you can access the browser with the address `http://localhost:port/`.

---
