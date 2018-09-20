package co.its.cy.core;

import java.io.File;

public class StringUtil {
	public static String getPackageInfo( File javaFile ){
		StringBuilder sb = new StringBuilder();
		sb.append("package ");
		String parentFilePath = javaFile.getParentFile().getPath();
		String packageStr = parentFilePath.substring(parentFilePath.indexOf("src\\")+4,
				parentFilePath.length());
		sb.append(packageStr.replace('\\', '.'));
		
		sb.append(";");
		sb.append("\n\n\n");
		return sb.toString();
	}
	
	public static String getInterfaceInfo( File domain_interface_File ){
		StringBuilder sb = new StringBuilder();
		sb.append("public interface ");
		
		String interface_Name = domain_interface_File.getName()
				.substring(0,domain_interface_File.getName().indexOf("."));
		sb.append(interface_Name);
		
		sb.append(" {");
		sb.append("\n\n}");
		
		return sb.toString();
	}
	/** 定义一个类文件的类信息 **/
	public static String getClassInfo( File domain_interface_impl_File,File domain_interface_File ){
		StringBuilder sb = new StringBuilder();
		sb.append("public class ");
		
		String class_Name = domain_interface_impl_File.getName()
				.substring(0,domain_interface_impl_File.getName().indexOf("."));
		sb.append(class_Name);
		
		
		sb.append(" implements ");
		
		String interface_Name = domain_interface_File.getName()
				.substring(0,domain_interface_File.getName().indexOf("."));
		sb.append(interface_Name);
		
		sb.append(" {");
		sb.append("\n\n}");
		
		return sb.toString();
	}
	
	/** 定义一个类文件文件的import信息 **/
	public static String getImportInfo(File domain_interface_File){
		StringBuilder sb = new StringBuilder();
		sb.append("import ");
		
		String importStr = getPackageInfo(domain_interface_File).substring( getPackageInfo(domain_interface_File).indexOf("package")+8,getPackageInfo(domain_interface_File).indexOf(";"))
				+"."
				+domain_interface_File.getName().substring(0,domain_interface_File.getName().indexOf("."));
		sb.append(importStr);
		
		sb.append(";");
		sb.append("\n\n\n");
	
		return sb.toString();
		
	}

}
