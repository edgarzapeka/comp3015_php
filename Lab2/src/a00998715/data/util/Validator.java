/**
 * Project: Lab2
 * File: Validator.java
 * Date: Jan 22, 2017
 * Time: 3:42:21 PM
 */
package a00998715.data.util;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class Validator {

	public static String Email(String email) {

		Pattern pattern = Pattern.compile("^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@" + "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
		Matcher matcher = pattern.matcher(email);

		if (matcher.matches()) {
			return email;
		}
		return "N/A";

	}

	public static String PostalCode(String postalCode) {

		Pattern pattern = Pattern.compile("^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$");
		Matcher matcher = pattern.matcher(postalCode);

		if (matcher.matches()) {
			return postalCode;
		}
		return "N/A";
	}

	public static String PhoneNumber(String phoneNumber) {

		Pattern pattern = Pattern.compile("^([(][0-9][0-9][0-9][)])\\s([0-9][0-9][0-9][-][0-9][0-9][0-9][0-9])$");
		Matcher matcher = pattern.matcher(phoneNumber);

		if (matcher.matches()) {
			return phoneNumber;
		}
		return "N/A";
	}
}
