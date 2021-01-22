<?php

/**
 * 더미
 * 
 * Copyright (c) BJRambo
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DummyAdminView extends Dummy
{
	/**
	 * 초기화
	 */
	public function init()
	{
		// 관리자 화면 템플릿 경로 지정
		$this->setTemplatePath($this->module_path . 'tpl');
	}
	
	/**
	 * 관리자 설정 화면 예제
	 */
	public function dispDummyAdminConfig()
	{
		// 현재 설정 상태 불러오기
		$config = $this->getConfig();
		
		
		$boardModuleList = executeQueryArray('dummy.getAllBoardList');
		
		// Context에 세팅
		Context::set('dummy_config', $config);
		Context::set('board_list', $boardModuleList->data);
		
		// 스킨 파일 지정
		$this->setTemplateFile('config');
	}
}
