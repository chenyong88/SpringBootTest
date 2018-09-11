package co.its.cy.entity;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

import org.hibernate.annotations.Table;

import lombok.Data;


@Data
@javax.persistence.Entity
@Table(appliesTo="AlarmType")
public class AlarmType  implements Serializable{
	private static final long serialVersionUID = -5218076739283020378L;
	
	@Id
	@GeneratedValue
	private Integer id;
  
	@Column(nullable = true)
	private String AlarmDesc;
	
	@Column
	private String GroupName;
	
	@Column
	private Integer ShowFlag;
	
	
}
