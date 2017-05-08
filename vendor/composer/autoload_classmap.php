<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'App\\Models\\Base' => $baseDir . '/app/models/Base.php',
    'App\\Models\\Block' => $baseDir . '/app/models/Block.php',
    'App\\Models\\Uri' => $baseDir . '/app/models/Uri.php',
    'App\\Modules\\Admin\\AdminServiceProvider' => $baseDir . '/app/modules/admin/AdminServiceProvider.php',
    'App\\Modules\\Admin\\Controllers\\Backend\\AdminController' => $baseDir . '/app/modules/admin/controllers/backend/AdminController.php',
    'App\\Modules\\Admin\\Controllers\\Backend\\Admin\\GroupController' => $baseDir . '/app/modules/admin/controllers/backend/admin/GroupController.php',
    'App\\Modules\\Admin\\Controllers\\Backend\\Admin\\RoleController' => $baseDir . '/app/modules/admin/controllers/backend/admin/RoleController.php',
    'App\\Modules\\Admin\\Models\\Admin' => $baseDir . '/app/modules/admin/models/Admin.php',
    'App\\Modules\\Admin\\Models\\Admin\\Group' => $baseDir . '/app/modules/admin/models/admin/Group.php',
    'App\\Modules\\Admin\\Models\\Admin\\Priviledge' => $baseDir . '/app/modules/admin/models/admin/Priviledge.php',
    'App\\Modules\\Admin\\Models\\Admin\\Role' => $baseDir . '/app/modules/admin/models/admin/Role.php',
    'App\\Modules\\Admin\\Models\\Admin\\Role\\Menu' => $baseDir . '/app/modules/admin/models/admin/role/Menu.php',
    'App\\Modules\\Admin\\Services\\Admin' => $baseDir . '/app/modules/admin/services/Admin.php',
    'App\\Modules\\Admin\\Services\\Admin\\Role' => $baseDir . '/app/modules/admin/services/admin/Role.php',
    'App\\Modules\\System\\Controllers\\Backend\\SystemController' => $baseDir . '/app/modules/system/controllers/backend/system/SystemController.php',
    'App\\Modules\\System\\Controllers\\Backend\\System\\MenuController' => $baseDir . '/app/modules/system/controllers/backend/system/MenuController.php',
    'App\\Modules\\System\\Controllers\\Backend\\System\\ResourceController' => $baseDir . '/app/modules/system/controllers/backend/system/ResourceController.php',
    'App\\Modules\\System\\Models\\System\\Menu' => $baseDir . '/app/modules/system/models/system/Menu.php',
    'App\\Modules\\System\\Models\\System\\Resource' => $baseDir . '/app/modules/system/models/system/Resource.php',
    'App\\Modules\\System\\Services\\System\\Menu' => $baseDir . '/app/modules/system/services/system/Menu.php',
    'App\\Modules\\System\\SystemServiceProvider' => $baseDir . '/app/modules/system/SystemServiceProvider.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'Maatwebsite\\Excel\\Classes\\Cache' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/Cache.php',
    'Maatwebsite\\Excel\\Classes\\FormatIdentifier' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/FormatIdentifier.php',
    'Maatwebsite\\Excel\\Classes\\LaravelExcelWorksheet' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/LaravelExcelWorksheet.php',
    'Maatwebsite\\Excel\\Classes\\PHPExcel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/PHPExcel.php',
    'Maatwebsite\\Excel\\Collections\\CellCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/CellCollection.php',
    'Maatwebsite\\Excel\\Collections\\ExcelCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/ExcelCollection.php',
    'Maatwebsite\\Excel\\Collections\\RowCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/RowCollection.php',
    'Maatwebsite\\Excel\\Collections\\SheetCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/SheetCollection.php',
    'Maatwebsite\\Excel\\Excel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Excel.php',
    'Maatwebsite\\Excel\\ExcelServiceProvider' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/ExcelServiceProvider.php',
    'Maatwebsite\\Excel\\Exceptions\\LaravelExcelException' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Exceptions/LaravelExcelException.php',
    'Maatwebsite\\Excel\\Facades\\Excel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Facades/Excel.php',
    'Maatwebsite\\Excel\\Files\\ExcelFile' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ExcelFile.php',
    'Maatwebsite\\Excel\\Files\\ExportHandler' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ExportHandler.php',
    'Maatwebsite\\Excel\\Files\\File' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/File.php',
    'Maatwebsite\\Excel\\Files\\ImportHandler' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ImportHandler.php',
    'Maatwebsite\\Excel\\Files\\NewExcelFile' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/NewExcelFile.php',
    'Maatwebsite\\Excel\\Filters\\ChunkReadFilter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Filters/ChunkReadFilter.php',
    'Maatwebsite\\Excel\\Parsers\\CssParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/CssParser.php',
    'Maatwebsite\\Excel\\Parsers\\ExcelParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/ExcelParser.php',
    'Maatwebsite\\Excel\\Parsers\\ViewParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/ViewParser.php',
    'Maatwebsite\\Excel\\Readers\\Batch' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/Batch.php',
    'Maatwebsite\\Excel\\Readers\\ConfigReader' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/ConfigReader.php',
    'Maatwebsite\\Excel\\Readers\\Html' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/HtmlReader.php',
    'Maatwebsite\\Excel\\Readers\\LaravelExcelReader' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/LaravelExcelReader.php',
    'Maatwebsite\\Excel\\Writers\\CellWriter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Writers/CellWriter.php',
    'Maatwebsite\\Excel\\Writers\\LaravelExcelWriter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Writers/LaravelExcelWriter.php',
    'Normalizer' => $vendorDir . '/patchwork/utf8/src/Normalizer.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);