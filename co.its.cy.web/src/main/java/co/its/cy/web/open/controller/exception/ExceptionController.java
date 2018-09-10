package co.its.cy.web.open.controller.exception;

import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.ResponseBody;

import co.its.cy.web.open.exception.RequestLimitException;

@ControllerAdvice(basePackages = {"co.its.cy.web.open.controller.demo"})
public class ExceptionController {

	@ExceptionHandler(RequestLimitException.class)
	@ResponseBody
    public String requestLimitException(Model model,RequestLimitException e) {
        model.addAttribute(e.getErrCode());
        model.addAttribute(e.getErrMsg());
        return model.toString();
    }
}
