package co.its.cy.entity.dto;
/**
 * 首页页面统计
 * @author rj007
 *
 */

import java.io.Serializable;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Data
@AllArgsConstructor
@NoArgsConstructor
@ToString
public class OverviewSatesChartDTO  implements Serializable{
	private static final long serialVersionUID = 1L;

	private String title;
	
	private Integer amount;
	
	private String percent;
	
	private Boolean increase;
	
	private String color;
	
	private String borderColor;

	private String background;
	
}
