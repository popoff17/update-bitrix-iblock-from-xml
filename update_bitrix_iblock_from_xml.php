<?require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule("iblock");?>

<?
$file = $_SERVER['DOCUMENT_ROOT'].'/1c_export/import_service.xml';
if (file_exists($file)) {
	$response = ImportXMLFile(
		$file,
		'service_book',
		's1',
		'N',  /*Действие, которое осуществляется с секциями, отсутствующими в файле импорта ("N" - ничего; "A" - деактивировать; "D" - удалить, используется по умолчанию).*/
		'N',/*Действие, которое осуществляется с элементами, отсутствующими в файле импорта ("N" - ничего; "A" - деактивировать; "D" - удалить, используется по умолчанию).*/
		false,
		false,
		false,
		true,
		false
	);

	if ($response !== true) {
		die($response);
	}
	@unlink($file);
	die('Импорт завершен');
}else{
	die('Файл отсутствует!');
}
?>

<? die; ?>