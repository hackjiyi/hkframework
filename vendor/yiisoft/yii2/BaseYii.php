<?php
/**
 * BaseYii 文件
 * @author weinengyu <jiyi@hkfx.net>
 * @version 1.0 20150124 1703
 */

namespace yii;
class BaseYii{
	public static $classMap;

	/**
	 * 获取版本信息
	 */
	public static function getVersion()
	{
		return '1.0';
	}
}