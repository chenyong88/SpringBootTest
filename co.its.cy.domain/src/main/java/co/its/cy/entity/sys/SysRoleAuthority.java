package co.its.cy.entity.sys;

import javax.persistence.Entity;

import co.its.cy.entity.base.BaseEntity;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;
@Data
@Entity
@AllArgsConstructor
@NoArgsConstructor
@EqualsAndHashCode(callSuper=false)
public class SysRoleAuthority  extends BaseEntity{
	private static final long serialVersionUID = 1L;
	private Integer RoleID;
	
	private Integer FunctionID;
	
	private Short Enable;
	

}
