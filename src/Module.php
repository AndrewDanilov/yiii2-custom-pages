<?php
namespace andrewdanilov\CustomPages;

use Yii;
use yii\helpers\FileHelper;

/**
 * @property array $categoryTemplates
 * @property array $pagesTemplates
 */
class Module extends \yii\base\Module
{
	public $templatesPath;

	public function getTemplatesPath()
	{
		if (empty($this->templatesPath)) {
			return '@andrewdanilov/CustomPages/frontend/templates';
		}
		return $this->templatesPath;
	}

	public function getCategoryTemplates()
	{
		$files = FileHelper::findFiles(Yii::getAlias($this->getTemplatesPath()), [
			'except' => ['category.default.php'],
			'only' => ['category.*.php'],
			'recursive' => false,
		]);
		$templates = [
			'default' => 'category.default.php',
		];
		foreach ($files as $file) {
			$tamplate = pathinfo($file, PATHINFO_FILENAME);
			$filename = pathinfo($file, PATHINFO_BASENAME);
			$templates[$tamplate] = $filename;
		}
		return $templates;
	}

	public function getPagesTemplates()
	{
		$files = FileHelper::findFiles(Yii::getAlias($this->getTemplatesPath()), [
			'except' => ['page.default.php'],
			'only' => ['page.*.php'],
			'recursive' => false,
		]);
		$templates = [
			'default' => 'page.default.php',
		];
		foreach ($files as $file) {
			$tamplate = pathinfo($file, PATHINFO_FILENAME);
			$filename = pathinfo($file, PATHINFO_BASENAME);
			$templates[$tamplate] = $filename;
		}
		return $templates;
	}
}