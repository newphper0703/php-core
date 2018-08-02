<?php
# __FILE__  文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。自 PHP 4.0.2 起，__FILE__ 总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。
# __DIR__  文件所在的目录,如果用在被包括文件中，则返回被包括的文件所在的目录。它等价于 dirname(__FILE__)
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if(!$fileinfo->isDir()){
        echo $fileinfo->getFilename(),"\t", $fileinfo->getSize(), PHP_EOL;
    }
}
