package co.its.cy.core;

public class MavenInfo {
	public static final String GROUP_ID = "co.its.cy";
	public static final String VERSION = "1.0.0";

	public static enum DDlAuto {
		UPDATE("update"), CREATE("create");

		public final String value;

		public String getValue() {
			return this.value;// 16
		}

		private DDlAuto(String value) {
			this.value = value;// 20
		}// 21
	}
}
