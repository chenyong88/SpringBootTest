package co.its.cy.web.open.core;

import java.lang.reflect.Field;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class Reflect {
	public static final Reflect reflect = new Reflect();

	public static Reflect newInstance() {
		return reflect;
	}

	public Object getFieldValueByName(String fieldName, Object o) {
		try {
			String e = fieldName.substring(0, 1).toUpperCase();
			String getter = "get" + e + fieldName.substring(1);
			Method method = o.getClass().getMethod(getter, new Class[0]);
			Object value = method.invoke(o, new Object[0]);
			return value;
		} catch (Exception arg6) {
			return null;
		}
	}

	public boolean exists(Object object, String serviceName, String methodName) throws RuntimeException {
		try {
			List e = newInstance().getFiledsInfo(object);

			for (int i = 0; i < e.size(); ++i) {
				Map map = (Map) e.get(i);
				Class clazz = Class.forName(map.get("type").toString().replaceAll("interface ", ""));
				Method[] methods = clazz.getMethods();
				Method[] arg8 = methods;
				int arg9 = methods.length;

				for (int arg10 = 0; arg10 < arg9; ++arg10) {
					Method method = arg8[arg10];
					if (method.getName().equals(methodName) && map.containsValue(serviceName)) {
						return true;
					}
				}
			}

			return false;
		} catch (Exception arg12) {
			return false;
		}
	}

	public String[] getFiledName(Object o) {
		Field[] fields = o.getClass().getDeclaredFields();
		String[] fieldNames = new String[fields.length];

		for (int i = 0; i < fields.length; ++i) {
			fieldNames[i] = fields[i].getName();
		}

		return fieldNames;
	}

	public List<Map<String, Object>> getFiledsInfo(Object o) {
		Field[] fields = o.getClass().getDeclaredFields();
		ArrayList list = new ArrayList();
		HashMap infoMap = null;

		for (int i = 0; i < fields.length; ++i) {
			infoMap = new HashMap();
			infoMap.put("type", fields[i].getType().toString());
			infoMap.put("name", fields[i].getName());
			infoMap.put("value", this.getFieldValueByName(fields[i].getName(), o));
			list.add(infoMap);
		}

		return list;
	}

	public Object[] getFiledValues(Object o) {
		String[] fieldNames = this.getFiledName(o);
		Object[] value = new Object[fieldNames.length];

		for (int i = 0; i < fieldNames.length; ++i) {
			value[i] = this.getFieldValueByName(fieldNames[i], o);
		}

		return value;
	}

	public Field[] getFields(Object c) {
		Field[] field = c.getClass().getDeclaredFields();

		try {
			for (int e = 0; e < field.length; ++e) {
				String name = field[e].getName();
				name = name.substring(0, 1).toUpperCase() + name.substring(1);
				String type = field[e].getGenericType().toString();
				Method m;
				if (type.equals("class java.lang.String")) {
					m = c.getClass().getMethod("get" + name, new Class[0]);
					String value = (String) m.invoke(c, new Object[0]);
					if (value == null) {
						m = c.getClass().getMethod("set" + name, new Class[]{String.class});
						m.invoke(c, new Object[]{""});
					}
				}

				if (type.equals("class java.lang.Integer")) {
					m = c.getClass().getMethod("get" + name, new Class[0]);
					Integer arg12 = (Integer) m.invoke(c, new Object[0]);
					if (arg12 == null) {
						m = c.getClass().getMethod("set" + name, new Class[]{Integer.class});
						m.invoke(c, new Object[]{Integer.valueOf(0)});
					}
				}

				if (type.equals("class java.lang.Boolean")) {
					m = c.getClass().getMethod("get" + name, new Class[0]);
					Boolean arg13 = (Boolean) m.invoke(c, new Object[0]);
					if (arg13 == null) {
						m = c.getClass().getMethod("set" + name, new Class[]{Boolean.class});
						m.invoke(c, new Object[]{Boolean.valueOf(false)});
					}
				}

				if (type.equals("class java.util.Date")) {
					m = c.getClass().getMethod("get" + name, new Class[0]);
					Date arg14 = (Date) m.invoke(c, new Object[0]);
					if (arg14 == null) {
						m = c.getClass().getMethod("set" + name, new Class[]{Date.class});
						m.invoke(c, new Object[]{new Date()});
						System.out.println(m);
					}
				}
			}
		} catch (NoSuchMethodException arg7) {
			arg7.printStackTrace();
		} catch (SecurityException arg8) {
			arg8.printStackTrace();
		} catch (IllegalAccessException arg9) {
			arg9.printStackTrace();
		} catch (IllegalArgumentException arg10) {
			arg10.printStackTrace();
		} catch (InvocationTargetException arg11) {
			arg11.printStackTrace();
		}

		return field;
	}
}
