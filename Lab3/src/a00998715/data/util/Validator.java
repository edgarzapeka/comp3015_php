/**
 * Project: Lab2
 * File: Validator.java
 * Date: Jan 22, 2017
 * Time: 3:42:21 PM
 */
package a00998715.data.util;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.time.format.DateTimeParseException;
import java.util.Arrays;

import a00998715.data.ApplicationException;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class Validator {

	private final static String EMAIL_PATTERN = "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@" + "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$";
	private final static String POSTAL_CODE_PATTERN = "^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$";
	private final static String PHONE_NUMBER_PATTERN = "^([(][0-9][0-9][0-9][)])\\s([0-9][0-9][0-9][-][0-9][0-9][0-9][0-9])$";
	private final static String INVALID_NUMBER_OF_RECORDS_PATTERN = "Expected 9 but got %d: %s  ";

	public static String validateEmail(String email) throws ApplicationException {

		if (email.matches(EMAIL_PATTERN)) {
			return email;
		}
		throw new ApplicationException("Invalid email: " + email);

	}

	public static String validatePostalCode(String postalCode) throws ApplicationException {

		if (postalCode.matches(POSTAL_CODE_PATTERN)) {
			return postalCode;
		}
		return "N/A";
	}

	public static String validatePhoneNumber(String phoneNumber) throws ApplicationException {

		if (phoneNumber.matches(PHONE_NUMBER_PATTERN)) {
			return phoneNumber;
		}
		throw new ApplicationException("Invalid phone number: " + phoneNumber);
	}

	public static void isAppropriateNumberOfFieldsForRecord(String[] customerInformation) throws ApplicationException {
		if (customerInformation.length < 9)
			throw new ApplicationException(
					String.format(INVALID_NUMBER_OF_RECORDS_PATTERN, customerInformation.length, Arrays.toString(customerInformation)));
	}

	public static String validateDateTime(String val) throws ApplicationException {

		DateTimeFormatter formatter = DateTimeFormatter.ofPattern("MMM dd uuuu");
		LocalDate formatted;

		if (val.length() != 8)
			throw new ApplicationException("Invalid format: " + val + ". Expected : YYYYMMDD");

		if (Integer.parseInt(val.substring(0, 4)) > LocalDate.now().getYear() || Integer.parseInt(val.substring(0, 4)) < 1900)
			throw new ApplicationException(
					"Invalid date for year: " + val.substring(0, 4) + ". (valid values 1900 - " + LocalDate.now().getYear() + ")");

		try {
			formatted = LocalDate.parse(val, DateTimeFormatter.BASIC_ISO_DATE);
		} catch (DateTimeParseException e) {
			throw new ApplicationException(e.getCause());
		}

		return formatted.format(formatter);

	}
}
