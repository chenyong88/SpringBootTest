package co.its.cy.common.entity;


public enum MainInfo {
 
 VSESION("1.0.0"),SYSTEMNAE("系统");
 private String value;
 private MainInfo( String value) {
	 this.value = value;
 }
 public String getValue() {
	return value;
 }
 @Override
 public String toString() {
	return value.toString();
 }
	
}
