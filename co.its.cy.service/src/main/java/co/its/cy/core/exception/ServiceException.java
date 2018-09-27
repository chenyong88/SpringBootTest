package co.its.cy.core.exception;

import java.io.PrintStream;
import java.io.PrintWriter;

public class ServiceException  extends RuntimeException{
	private static final long serialVersionUID = 1L;
	public ServiceException() {	}
	public ServiceException(String message, Throwable cause, boolean enableSuppression, boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}
	public ServiceException(String message, Throwable cause) {
		super(message, cause);
	}
	public ServiceException(String message) {
		super(message);
	}

	public ServiceException(Throwable cause) {
		super(cause);
	}

	public String getMessage() {
		return super.getMessage();
	}

	public String getLocalizedMessage() {
		return super.getLocalizedMessage();
	}

	public synchronized Throwable getCause() {
		return super.getCause();
	}

	public synchronized Throwable initCause(Throwable cause) {
		return super.initCause(cause);
	}

	public String toString() {
		return super.toString().replace(this.getClass().getName().concat(": "), "");
	}

	public void printStackTrace() {
		super.printStackTrace();
	}

	public void printStackTrace(PrintStream s) {
		super.printStackTrace(s);
	}

	public void printStackTrace(PrintWriter s) {
		super.printStackTrace(s);
	}

	public synchronized Throwable fillInStackTrace() {
		return super.fillInStackTrace();
	}

	public StackTraceElement[] getStackTrace() {
		return super.getStackTrace();
	}

	public void setStackTrace(StackTraceElement[] stackTrace) {
		super.setStackTrace(stackTrace);
	}

}
