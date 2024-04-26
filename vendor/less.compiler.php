<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/vendor/lessc.inc.php");
$ar_less = glob($_SERVER["DOCUMENT_ROOT"] . "/less/*.less");

// Компилим все less в один css
$less_string = "";
foreach (glob($_SERVER["DOCUMENT_ROOT"] . "/less/*.less") as $file) {
	$ar_file = (pathinfo($file));
	$less_string .= file_get_contents($file);
};
file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/less/log/less_build.less", $less_string);
try {
	$less = new lessc;
	$less -> setFormatter("compressed");
	$css_string = $less->compile($less_string);
	file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/css/styles.min.css", $css_string);
} catch (exception $e) {
	echo "fatal error: " . $e->getMessage();
}

// Компилим все less в отдельные css
//foreach ($ar_less as $filename) {
//	$ar_file = (pathinfo($filename));
//	try {
//		$less = new lessc;
//		$less -> setFormatter("compressed");
//		$less->compileFile($filename, $_SERVER["DOCUMENT_ROOT"] . "/css/" . $ar_file["filename"] . ".min.css");
//	} catch (exception $e) {
//		echo "fatal error: " . $e->getMessage();
//	}
//};