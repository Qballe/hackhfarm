<?php
$project_name = 'hackhfarm';

$payload = json_decode($_POST['payload']);
$changes = $payload->commits;

$git_result = `git pull`;
echo $project_name;
shell_exec($git_result);
?>