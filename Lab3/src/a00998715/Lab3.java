/**
 * Project: Lab3
 * File: Lab2.java
 * Date: Jan 22, 2017
 * Time: 3:18:33 PM
 */
package a00998715;

import java.time.Duration;
import java.time.Instant;

import a00998715.data.ApplicationException;
import a00998715.io.CustomerReader;
import a00998715.io.CustomerReport;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class Lab3 {

	static void run(final String input) {

		CustomerReader readCommandLineArguments = new CustomerReader(input);

		try {
			CustomerReport report = readCommandLineArguments.createCustomerReport();
			report.print();
		} catch (ApplicationException e) {
			System.out.println(e.toString());
		} finally {

		}
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {

		Instant startTime = Instant.now();
		System.out.println(startTime);

		Lab3.run(args[0]);

		Instant endTime = Instant.now();
		System.out.println(endTime);

		System.out.println(String.format("Duration: %d ms", Duration.between(startTime, endTime).toMillis()));
	}
}
