<?php
/**
 * 框架自动加载类文件
 *
 * @auther weinengyu <jiyi@hkfx.net>
 * @version 1.0 20150424
 */
class ComposerAutoloader{
	private static $loader; // 静态变量	

	/**
    * 对Composer\Autoload\ClassLoader类引入文件
    * param string $className 类名称
    */
	public static function loadClassLoad($className)
	{
		if ($className == 'Composer\Autoload\ClassLoader') {
			require __DIR__ . '/ClassLoader.php';
		}
	}

	public static function getLoader()
	{	
		if (null !== SELF::$loader) { // 单例模式
			return SELF::$loader;
		}

		// 包含自动加载命名空间文件
		spl_autoload_register(['ComposerAutoloader', 'loadClassLoad'], true, true);
		$loader = new Composer\Autoload\ClassLoader();

		// 扩展类文件
		$map = require(__DIR__ . '/aotuload_namespace.php');
		foreach ($map as $namespace => $path) {
			$loader->set($namespace, $path);
		}
		
		// yii常用类文件
		$map = require(__DIR__ . '/autoload_psr4.php');

		foreach ($map as $namespace => $path) {
			$loader->setPsr4($namespace, $path);
		}

		// class map namespace
		$classMap = require(__DIR__ . '/autoload_classmap.php');
		foreach ($classMap as $namespace => $path) {
			$loader->set($namespace, $path);
		}

		// 单独的文件
		$includeFiles = require __DIR__ . '/autoload_files.php';
		foreach ($includeFiles as $file) {
			require $file;
		}

		return $loader;
	}
}

