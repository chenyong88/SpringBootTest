package co.its.cy.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import co.its.cy.entity.AlarmType;

public interface CustomerRepository extends JpaRepository<AlarmType, Integer>{

}
