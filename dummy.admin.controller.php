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
	public function procDummyAdminInsertDocuments()
	{
		// 제출받은 데이터 불러오기
		$obj = Context::getRequestVars();
		
		if($obj->dummy_count <= 0)
		{
			throw new Rhymix\Framework\Exceptions\InvalidRequest;
		}
		
		$module_info = moduleModel::getModuleInfoByModuleSrl($obj->module_srl);
		if(!$module_info->module_srl)
		{
			throw new Rhymix\Framework\Exceptions\InvalidRequest;
		}
		$count = intval($obj->dummy_count);

		$args = new stdClass();
		$args->email_address = $this->user->email_address;
		$args->homepage = $this->user->homepage;
		$args->user_id = $this->user->user_id;
		$args->user_name = $this->user->user_name;
		$args->nick_name = $this->user->nick_name;
		$args->member_srl = $this->user->member_srl;
		if ($module_info->use_anonymous === 'Y')
		{
			$anonymousName = 'anonymous';
			$args->email_address = $args->homepage = $args->user_id = '';
			$args->user_name = $args->nick_name = $anonymousName;
			$args->member_srl = -1 * $this->user->member_srl;
		}
		$args->module_srl = $module_info->module_srl;
		$args->mid = $module_info->mid;

		$args->regdate = date('YmdHis');
		$args->status = 'PUBLIC';
		$args->comment_status = 'ALLOW';
		
		$args->module_srl = $module_info->module_srl;
		$oDocumentController = documentController::getInstance();

		$time_pre = microtime(true);
		
		for($i = 0; $i <= $count; $i++)
		{
			$time_post = microtime(true);
			$exec_time = $time_post - $time_pre;
			if($exec_time > 25.0)
			{
				throw new Rhymix\Framework\Exception("글 등록중 시간이 초과되었습니다. 총 {$i}개의 게시글을 등록 하였습니다.");
			}
			
			$titleRandNumber = rand(0, count(self::$arrayDocumentTitle) - 1);
			$contentRandNumber = rand(0, count(self::$arrayDocumentContent) -1);
			$args->title = self::$arrayDocumentTitle[$titleRandNumber];
			$args->content = self::$arrayDocumentContent[$contentRandNumber];
			$args->document_srl = getNextSequence();
			$output = $oDocumentController->insertDocument($args);
			if(!$output->toBool())
			{
				return $output;
			}
		}
		
		// 설정 화면으로 리다이렉트
		$this->setMessage('success_registed');
		$this->setRedirectUrl(Context::get('success_return_url'));
	}
}
