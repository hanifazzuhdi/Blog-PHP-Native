<?php

spl_autoload_register(function ($class) {
    require "controller/" . $class . ".php";
});
