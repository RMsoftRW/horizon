<?php
$br = (php_sapi_name() == "cli")? "":"<br>";

var_dump([
    SODIUM_LIBRARY_MAJOR_VERSION,
    SODIUM_LIBRARY_MINOR_VERSION,
    SODIUM_LIBRARY_VERSION
]);

if(!extension_loaded('sodium')) {
    dl('libsodium.' . PHP_SHLIB_SUFFIX);
}
$module = 'sodium';
$functions = get_extension_funcs($module);
echo "Functions available in the test extension:$br\n";
foreach($functions as $func) {
    echo $func."$br\n";
}
echo "$br\n";
$function = 'sodium_memzero';
$exit = 0;
if (extension_loaded($module)) {
    $str = $function($module);
} else {
    $str = "Module $module is not compiled into PHP";
    $exit = 255;
}
echo "$str\n";
exit($exit);
?>
