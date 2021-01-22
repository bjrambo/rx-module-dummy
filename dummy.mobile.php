<?php

include_once __DIR__ . '/dummy.view.php';

/**
 * 더미
 * 
 * Copyright (c) BJRambo
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DummyMobile extends DummyView
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 스킨 경로 지정
		$this->setTemplatePath($this->module_path . 'm.skins/' . ($this->module_info->mskin ?: 'default'));
	}
	
	/**
	 * 이 클래스에서 따로 정의하지 않은 함수는 View를 따름
	 */
}
