<?php

/**
 * 더미
 * 
 * Copyright (c) BJRambo
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DummyAdminController extends Dummy
{
	/**
	 * 관리자 설정 저장 액션 예제
	 */
	public function procDummyAdminInsertConfig()
	{
		// 현재 설정 상태 불러오기
		$config = $this->getConfig();
		
		// 제출받은 데이터 불러오기
		$vars = Context::getRequestVars();
		
		// 제출받은 데이터를 각각 적절히 필터링하여 설정 변경
		if (in_array($vars->example_config, ['Y', 'N']))
		{
			$config->example_config = $vars->example_config;
		}
		else
		{
			return $this->createObject(-1, '설정값이 이상함');
		}
		
		// 변경된 설정을 저장
		$output = $this->setConfig($config);
		if (!$output->toBool())
		{
			return $output;
		}
		
		// 설정 화면으로 리다이렉트
		$this->setMessage('success_registed');
		$this->setRedirectUrl(Context::get('success_return_url'));
	}
}
