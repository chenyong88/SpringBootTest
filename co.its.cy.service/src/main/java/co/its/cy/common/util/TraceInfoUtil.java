package co.its.cy.common.util;

public class TraceInfoUtil {
	public static String getThisClassRunPath() {
		StringBuffer sb = new StringBuffer();// 11
		StackTraceElement[] stacks = (new Throwable()).getStackTrace();// 12
		sb.append("class: ").append(stacks[1].getClassName());// 13
		return sb.toString();// 14
	}

	public static String getThisClassRunMethodName() {
		StringBuffer sb = new StringBuffer();// 18
		StackTraceElement[] stacks = (new Throwable()).getStackTrace();// 19
		sb.append("; method: ").append(stacks[1].getMethodName());// 20
		return sb.toString();// 21
	}

	public static String getThisClassRunLine() {
		StringBuffer sb = new StringBuffer();// 25
		StackTraceElement[] stacks = (new Throwable()).getStackTrace();// 26
		sb.append("; line: ").append(stacks[1].getLineNumber());// 27
		return sb.toString();// 28
	}

	public static String getThisClassRunMethodNameLine() {
		StringBuffer sb = new StringBuffer();// 32
		StackTraceElement[] stacks = (new Throwable()).getStackTrace();// 33
		sb.append("; method: ").append(stacks[1].getMethodName()).append("; line: ").append(stacks[1].getLineNumber());// 34 35
		return sb.toString();// 36
	}

	public static String getTraceInfo() {
		StringBuffer sb = new StringBuffer();// 40
		StackTraceElement[] stacks = (new Throwable()).getStackTrace();// 41
		sb.append("class: ").append(stacks[1].getClassName()).append("; method: ").append(stacks[1].getMethodName())
				.append("; line: ").append(stacks[1].getLineNumber());// 42
		return sb.toString();// 43
	}

	public static StringBuffer getExceptionTraceInfo(Class<?> clazz, Throwable e) {
		StringBuffer sb = new StringBuffer();// 47
		StackTraceElement[] stacks = e.getStackTrace();// 48

		for (int i = 0; i < stacks.length; ++i) {// 49
			if (stacks[i].getClassName().contains(clazz.getName())) {// 50
				sb.append("class: ").append(stacks[i].getClassName()).append("; method: ")
						.append(stacks[i].getMethodName()).append("; line: ").append(stacks[i].getLineNumber())
						.append(";  Exception: ").append(getExceptionMessage(e));// 51 52 53 54
				break;// 55
			}
		}

		return sb;// 58
	}

	public static int getExceptionLine(Class<?> clazz, Throwable e) {
		StringBuffer sb = new StringBuffer();// 62
		StackTraceElement[] stacks = e.getStackTrace();// 63

		for (int i = 0; i < stacks.length; ++i) {// 64
			if (stacks[i].getClassName().contains(clazz.getName())) {// 65
				sb.append(stacks[i].getLineNumber());// 66
				break;// 67
			}
		}

		return sb.length() == 0 ? -1 : Integer.valueOf(sb.toString()).intValue();// 70 71 73
	}

	public static String getExceptionMessage(Throwable e) {
		String message = e.toString();// 79
		if (message.lastIndexOf(":") != -1) {// 80
			message = message.substring(0, message.lastIndexOf(":"));// 81
		}

		return message;// 83
	}
}
