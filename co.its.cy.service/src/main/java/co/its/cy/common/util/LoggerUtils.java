package co.its.cy.common.util;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public final class LoggerUtils {
	public static Logger logger;

	public static void error(Class<?> clazz, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 16
		logger.error(toString(messages));// 17
	}// 18

	public static void error(Class<?> clazz, String format, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 21
		logger.error(format, toString(messages));// 22
	}// 23

	public static void error(Class<?> clazz, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 26
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 27
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 28
		logger.error(toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 29
	}// 30

	public static void error(Class<?> clazz, String format, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 33
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 34
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 35
		logger.error(format, toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 36
	}// 37

	public static void debug(Class<?> clazz, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 40
		logger.debug(toString(messages));// 41
	}// 42

	public static void debug(Class<?> clazz, String format, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 45
		logger.debug(format, toString(messages));// 46
	}// 47

	public static void debug(Class<?> clazz, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 50
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 51
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 52
		logger.debug(toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 53
	}// 54

	public static void debug(Class<?> clazz, String format, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 57
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 58
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 59
		logger.debug(format, toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 60
	}// 61

	public static void info(Class<?> clazz, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 64
		logger.info(toString(messages));// 65
	}// 66

	public static void info(Class<?> clazz, String format, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 69
		logger.info(format, toString(messages));// 70
	}// 71

	public static void info(Class<?> clazz, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 74
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 75
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 76
		logger.info(toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 77
	}// 78

	public static void info(Class<?> clazz, String format, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 81
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 82
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 83
		logger.info(format, toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 84
	}// 85

	public static void warn(Class<?> clazz, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 88
		logger.warn(toString(messages));// 89
	}// 90

	public static void warn(Class<?> clazz, String format, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 93
		logger.warn(format, toString(messages));// 94
	}// 95

	public static void warn(Class<?> clazz, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 98
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 99
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 100
		logger.warn(toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 101
	}// 102

	public static void warn(Class<?> clazz, String format, Throwable throwable, Object... messages) {
		logger = LoggerFactory.getLogger(clazz);// 105
		int exceptionLine = TraceInfoUtil.getExceptionLine(clazz, throwable);// 106
		String exceptionType = TraceInfoUtil.getExceptionMessage(throwable);// 107
		logger.warn(format, toString(messages) + throwable.getMessage() + " - " + exceptionType + " line number - "
				+ exceptionLine);// 108
	}// 109

	public static String toString(Object... messages) {
		String string = "";// 112

		for (int i = 0; i < messages.length; ++i) {// 113
			string = string.concat(messages[i] + "".concat(" "));// 114
		}

		return string;// 116
	}
}
