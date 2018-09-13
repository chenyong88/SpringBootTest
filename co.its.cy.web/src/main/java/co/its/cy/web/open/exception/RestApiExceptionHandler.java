package co.its.cy.web.open.exception;

import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import co.its.cy.web.open.common.entity.ApiResult;
import co.its.cy.web.open.common.entity.ApiResultGenerator;

/**
 * 全局异常处理
 * @author rj007
 *
 */
@ControllerAdvice(annotations = RestController.class)
@ResponseBody
public class RestApiExceptionHandler {
	@ExceptionHandler
	@ResponseStatus
	public ApiResult runtimeExceptionHandler(Exception e) {
		StackTraceElement [] stackTraceElement  = e.getStackTrace();
		String errMsg =  "the  exception Reason is 【" ;
		errMsg +=( (e.getMessage() == null ))?  e.toString(): e.getMessage() +"】";
		for (int i = 0; i < stackTraceElement.length; i++) {
			String declaringClass = stackTraceElement[i].getClassName();
			if(declaringClass.startsWith("co.its.cy.web.open.controller")) {
				errMsg += " the className is "+ stackTraceElement[i].getFileName() 
					   +  " the methodName is " + stackTraceElement[i].getMethodName() +"()"
				       +  " the lineNumber is " + stackTraceElement[i].getLineNumber();
				break;
			};
		}
		return ApiResultGenerator.errorRessult(errMsg, e);
	}
	
}
