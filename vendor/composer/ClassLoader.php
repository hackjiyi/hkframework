<?php

namespace Composer\Autoload;

/**
 * 框架自动加载类文件
 *
 * @auther weinengyu <jiyi@hkfx.net>
 * @version 1.0 20150424
 */
class ClassLoader{
	private $prefixLengthsPsr4 = array();
    private $prefixDirsPsr4 = array();
    private $fallbackDirsPsr4 = array();

	private $profixesPsro;

	/**
	 * 将namespace路径存在ProfixesPsro
	 */
	public function set($proifx, $path)
	{
		$this->profixesPsro[$proifx[0]][$proifx] = $path;
	}

	/**
	 * 将yiisoft类的namespace路径存放在prefixLengthsPsr4
	 */
	public function setPsr4($proifx, $path)
	{
		$length = strlen($proifx);

		if ('\\' == $proifx[$length - 1]) {
			exit;
		}

		$this->prefixLengthsPsr4[$proifx[0]][$proifx] = $length;
		$this->prefixDirsPsr4[$proifx] = (array)$path;
	}
}
