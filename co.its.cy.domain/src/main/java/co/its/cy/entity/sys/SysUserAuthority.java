package co.its.cy.entity.sys;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import co.its.cy.entity.base.BaseEntity;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

@Data
@Entity
@Table
@AllArgsConstructor
@NoArgsConstructor
@EqualsAndHashCode(callSuper=false)
public class SysUserAuthority extends BaseEntity {
	private static final long serialVersionUID = 1L;
	
	private Integer UserID;
	
	private Integer FunctionID;
	
	private Integer Enable;

	
}
