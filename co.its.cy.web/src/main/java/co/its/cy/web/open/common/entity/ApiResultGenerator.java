package co.its.cy.web.open.common.entity;

import java.util.List;

public final class ApiResultGenerator {
	public static ApiResult result(boolean flag ,String msg , Object result , String jumpUrl, int rows ,Throwable throwable) {
		ApiResult apiResult  =  ApiResult.newInstance();
		apiResult.setFlag(flag);
		apiResult.setMsg(msg == "" ?"执行成功":msg);
		apiResult.setResult(result);
		apiResult.setJumpUrl(jumpUrl);
		apiResult.setTime(System.currentTimeMillis());
		apiResult.setRows(rows);
		return apiResult;
	}
	
	/**
	 * 成功时调用
	 * @param result
	 * @return
	 */
	public static ApiResult successRessult(Object result) {
		int rows = 0;
		if(result instanceof List) {
			rows = ((List<?>) result).size();
		}
		return result(true, "", result, "", rows, null);
	}
	/**
	 * 失败时调用
	 * @param result
	 * @return
	 */
	public static ApiResult errorRessult(String msg,Throwable throwable) {
		return result(false,msg, "", "", 0, throwable);
	}
	
}
