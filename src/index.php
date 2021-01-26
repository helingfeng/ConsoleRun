<?php

include __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

$process = new Process(['ping', 'www.qq.com', '-c10']);
//$process->run();


// executes after the command finishes / 命令完成后执行
$process->start();

while ($process->isRunning()) {
    // waiting for process to finish / 等待进程完成
    $output = $process->getOutput();
    $process->clearOutput();

    echo $output;
    sleep(1);
}

if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}
