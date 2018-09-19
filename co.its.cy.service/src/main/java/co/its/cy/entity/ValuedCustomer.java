package co.its.cy.entity;

import javax.persistence.Entity;

import lombok.Data;

@Data
@Entity
public class ValuedCustomer  extends Customer{
	private String valuedCustomerName;
}
