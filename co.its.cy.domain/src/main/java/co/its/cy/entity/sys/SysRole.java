package co.its.cy.entity.sys;

import javax.persistence.Entity;
import javax.persistence.Table;

import co.its.cy.entity.base.BaseEntity;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Data
@Entity
@Table
@AllArgsConstructor
@NoArgsConstructor
@ToString
@EqualsAndHashCode(callSuper=false)
public class SysRole  extends BaseEntity{
	private static final long serialVersionUID = 1L;

	private String RoleName;
	
	private Integer CreateUserID;
	
	private String CreateUserName;
	
	private Boolean Active;
	
	private String Memo;
	
	
}
