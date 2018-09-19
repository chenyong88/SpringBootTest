package co.its.cy.core.model;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.lang.reflect.Field;
import java.text.MessageFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Transient;

import com.alibaba.dubbo.common.utils.IOUtils;
import com.alibaba.dubbo.common.utils.StringUtils;

import co.its.cy.common.util.LoggerUtils;
import co.its.cy.core.MavenInfo.DDlAuto;


/**
 * 
 * 
 * @author chenyong
 * @projectName co.its.cy.service
 * @typeName ModelCreateRepositoryFactory
 * @time 2018年9月17日 下午7:19:01
 */
public class ModelCreateRepositoryFactory {
	static ModelCreateRepositoryFactory createFactory = new ModelCreateRepositoryFactory();

	public static ModelCreateRepositoryFactory newInstance() {
		return createFactory;// 38
	}

	public void autoCreateClass(String repositoryCreatePackage, String modelPackage, String groupid, DDlAuto ddlAuto,
			String[] transients) throws ClassNotFoundException, IOException {
		ClassLoader classloader = Thread.currentThread().getContextClassLoader();// 54
		InputStream serviceMethodIs = classloader.getResourceAsStream("repository-interface.template");// 55
		String relativelyPath = System.getProperty("user.dir");// 56
		String[] path = relativelyPath.split(File.separator.concat(File.separator));// 57
		String projectName = path[path.length - 1];// 58
		String[] temp = projectName.split("-");// 59
		String serviceName = temp[temp.length - 1];// 60
		String[] serviceNameTemp = serviceName.split("[.]");// 61
		serviceName = serviceNameTemp[serviceNameTemp.length - 1];// 62
		String apiPath = relativelyPath.concat(File.separator.concat("src").concat(File.separator).concat("main")
				.concat(File.separator).concat("java").concat(File.separator));// 64 65 66 67 68 69
		String[] apiPackagePackageArray = modelPackage.split("\\.");// 70

		for (int servicePath = 0; servicePath < apiPackagePackageArray.length; ++servicePath) {// 71
			apiPath = apiPath.concat(apiPackagePackageArray[servicePath]).concat(File.separator);// 72 73 74
		}

		apiPath = apiPath.concat(serviceName).concat(File.separator);// 77 78
		String arg21 = relativelyPath.replace("domain", "service");// 80
		arg21 = arg21.concat(File.separator.concat("src").concat(File.separator).concat("main").concat(File.separator)
				.concat("java").concat(File.separator));// 81 82 83 84 85 86
		String[] serviceCreatePackageArray = repositoryCreatePackage.split("\\.");// 87
		String serviceCreatePackagePath = "";// 88

		for (int apiFile = 0; apiFile < serviceCreatePackageArray.length; ++apiFile) {// 89
			arg21 = arg21.concat(serviceCreatePackageArray[apiFile]).concat(File.separator);// 90 91 92
			serviceCreatePackagePath = serviceCreatePackagePath.concat(serviceCreatePackageArray[apiFile]).concat(".");// 93
		}

		System.out.println(serviceCreatePackagePath);// 95
		File arg22 = new File(apiPath);// 96
		File[] apiArray = arg22.listFiles();// 97
		if (null == apiArray) {// 99
			LoggerUtils.info(this.getClass(), "模型不存在", new Object[0]);// 100
		} else if (!(new File(arg21)).exists()) {// 104
			LoggerUtils.info(this.getClass(), "业务组件不存在", new Object[0]);// 105
		} else {
			String serviceMethodText = IOUtils.toString(serviceMethodIs, "UTF-8");// 109
			this.createRepositorys(ddlAuto, modelPackage, groupid, transients, classloader, serviceName, arg21,
					apiArray, serviceMethodText, serviceCreatePackagePath);// 111
		}
	}// 101 106 113

	private void createRepositorys(DDlAuto ddlAuto, String modelPackage, String groupid, String[] transients,
			ClassLoader classloader, String serviceName, String servicePath, File[] apiArray, String serviceMethodText,
			String serviceCreatePackagePath) throws ClassNotFoundException {
		for (int i = 0; i < apiArray.length; ++i) {// 119
			File api = apiArray[i];// 120
			String apiName = api.getName().replaceAll(".java", "");// 121
			String simpleName = apiName;// 122
			apiName = "I".concat(apiName);// 123
			File file = new File(servicePath.concat(apiName.concat("Repository").concat(".java")));// 124
			boolean isTransient = false;// 126

			for (int e = 0; e < transients.length; ++e) {// 127
				if (simpleName.indexOf(transients[e]) >= 0) {// 128
					isTransient = true;// 129
				}
			}

			if (!isTransient) {// 132
				switch (null.$SwitchMap$co$jufeng$core$MavenInfo$DDlAuto[ddlAuto.ordinal()]) {// 137
				case 1:
					if (file.isFile()) {// 139
						System.out.println("file UPDATE ==============" + file);// 140

						try {
							FileInputStream arg31 = new FileInputStream(file);// 143
							String javaText = IOUtils.toString(arg31, "UTF-8");// 144
							Class model = Class.forName(modelPackage.concat(".").concat(serviceName).concat(".")
									.concat(api.getName().replaceAll(".java", "")));// 146

							ArrayList fieldList;
							for (fieldList = new ArrayList(); model != null; model = model.getSuperclass()) {// 147 148 150
								fieldList.addAll(Arrays.asList(model.getDeclaredFields()));// 149
							}

							Field[] modelFields = (Field[]) fieldList.toArray(new Field[fieldList.size()]);// 153
							ArrayList newField = new ArrayList();// 155

							String m;
							for (int serviceMethodTexts = 0; serviceMethodTexts < modelFields.length; ++serviceMethodTexts) {// 156
								String p = modelFields[serviceMethodTexts].getName();// 157
								m = "getBy".concat(StringUtils.toFirstUpperCase(p));// 158
								if (javaText.indexOf(m) < 0 && !"serialVersionUID".equals(p)) {// 159
									newField.add(modelFields[serviceMethodTexts]);// 162
									LoggerUtils.info(this.getClass(), "{}", new Object[] { "addFieldName=", m });// 163
								}
							}

							if (newField.size() != 0) {// 166
								StringBuffer arg32 = new StringBuffer();// 171

								for (int arg33 = 0; arg33 < newField.size(); ++arg33) {// 173
									m = ((Field) newField.get(arg33)).getName();// 174
									Class output = ((Field) newField.get(arg33)).getType();// 175
									String returnClass = "java.util.List<".concat(simpleName).concat(">");// 176
									Transient transientField = (Transient) ((Field) newField.get(arg33))
											.getAnnotation(Transient.class);// 178
									if (null == transientField) {// 179
										Column column = (Column) ((Field) newField.get(arg33))
												.getAnnotation(Column.class);// 183
										if (null != column) {// 184
											boolean tempText = column.unique();// 185
											if (tempText) {// 186
												returnClass = simpleName;// 187
											}
										}

										String arg37 = MessageFormat.format(serviceMethodText,
												new Object[] { m, m, returnClass, returnClass,
														StringUtils.toFirstUpperCase(m),
														output.toString().replaceAll("class ", ""), m });// 191 196 197
										arg32.append(arg37);// 200
									}
								}

								Pattern arg34 = Pattern.compile("}$");// 202
								arg34.matcher(javaText);// 203
								Matcher arg35 = arg34.matcher(javaText);// 204
								javaText = arg35.replaceFirst(arg32.toString().concat("\n}"));// 205
								FileOutputStream arg36 = new FileOutputStream(file);// 206
								IOUtils.write(javaText.getBytes("UTF-8"), arg36);// 207
								LoggerUtils.info(this.getClass(), file.getPath(), new Object[0]);// 208
								LoggerUtils.info(this.getClass(), javaText, new Object[0]);// 209
							}
						} catch (Exception arg30) {// 211
							arg30.printStackTrace();// 212
						}
					} else {
						this.createRepository(modelPackage, serviceName, api, simpleName, serviceMethodText,
								classloader, groupid, file, transients);// 216
					}
					break;
				case 2:
					this.createRepository(modelPackage, serviceName, api, simpleName, serviceMethodText, classloader,
							groupid, file, transients);// 221
				}
			}
		}

	}// 228

	void createRepository(String modelPackage, String serviceName, File api, String simpleName,
			String serviceMethodText, ClassLoader classloader, String groupid, File file, String[] transients)
			throws ClassNotFoundException {
		String modelPackagePath = modelPackage.concat(".").concat(serviceName).concat(".")
				.concat(api.getName().replaceAll(".java", ""));// 231 232 233 234 235
		LoggerUtils.info(this.getClass(), ">>>>>>>>>" + api, new Object[0]);// 236
		LoggerUtils.info(this.getClass(), ">>>>>>>>>" + modelPackagePath, new Object[0]);// 237
		Class c = Class.forName(modelPackagePath);// 238
		Entity entity = (Entity) c.getAnnotation(Entity.class);// 240
		if (null != entity) {// 241
			StringBuffer serviceMethodTexts = new StringBuffer();// 244
			String uuid = null;// 246

			ArrayList fieldList;
			for (fieldList = new ArrayList(); c != null; c = c.getSuperclass()) {// 248 249 251
				fieldList.addAll(Arrays.asList(c.getDeclaredFields()));// 250
			}

			Field[] fields = (Field[]) fieldList.toArray(new Field[fieldList.size()]);// 253

			String serviceText;
			for (int e = 0; e < fields.length; ++e) {// 254
				serviceText = fields[e].getName();// 255
				Class javaText = fields[e].getType();// 256
				String output = "java.util.List<".concat(simpleName).concat(">");// 257
				if (serviceText.equals("id")) {// 258
					output = simpleName;// 259
					uuid = javaText.toString().replace("class ", "");// 260
				}

				Transient transientField = (Transient) fields[e].getAnnotation(Transient.class);// 263
				if (null == transientField) {// 264
					Column column = (Column) fields[e].getAnnotation(Column.class);// 268
					if (null != column) {// 269
						boolean tempText = column.unique();// 270
						if (tempText) {// 271
							output = simpleName;// 272
						}
					}

					if (!"serialVersionUID".equals(serviceText)) {// 277
						String arg25 = MessageFormat.format(serviceMethodText,
								new Object[] { serviceText, serviceText, output, output,
										StringUtils.toFirstUpperCase(serviceText),
										javaText.toString().replaceAll("class ", ""), serviceText });// 278 283 284
						serviceMethodTexts.append(arg25);// 287
					}
				}
			}

			try {
				InputStream arg26 = classloader.getResourceAsStream("repository.template");// 292
				serviceText = IOUtils.toString(arg26, "UTF-8");// 293
				String arg27 = MessageFormat.format(serviceText,
						new Object[] { groupid, serviceName.toLowerCase(), "co.jufeng", groupid,
								serviceName.toLowerCase(), simpleName, simpleName, simpleName, simpleName, uuid, "{",
								serviceMethodTexts, "}" });// 294 296 299
				FileOutputStream arg24 = new FileOutputStream(file);// 309
				IOUtils.write(arg27.getBytes("UTF-8"), arg24);// 310
				LoggerUtils.info(this.getClass(), file.getPath(), new Object[0]);// 311
				LoggerUtils.info(this.getClass(), arg27, new Object[0]);// 312
			} catch (Exception arg23) {// 313
				arg23.printStackTrace();// 314
			}

		}
	}// 242 316
}
