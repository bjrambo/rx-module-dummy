<?php

/**
 * 더미
 * 
 * Copyright (c) BJRambo
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DummyView extends Dummy
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 스킨 경로 지정
		$this->setTemplatePath($this->module_path . 'skins/' . ($this->module_info->skin ?: 'default'));
	}
	
	/**
	 * 메인 화면 예제
	 */
	public function dispDummyIndex()
	{
		// 스킨 파일명 지정
		$this->setTemplateFile('index');
	}
}
