/**
 * Project: Lab2
 * File: Lab2.java
 * Date: Jan 22, 2017
 * Time: 3:18:33 PM
 */
package a00998715;

import a00998715.data.io.CustomerReader;
import a00998715.data.io.CustomerReport;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class Lab2 {

	/**
	 * @param args
	 */
	public static void main(String[] args) {

		if (args.length == 0) {
			System.out.println("Usage java -jar A00123456Lab2.jar <input string>");
			System.exit(-1);
		} else {
			CustomerReader readCommandLineArguments = new CustomerReader(args[0]);
			CustomerReport report = readCommandLineArguments.createCustomerReport();
			report.print();
		}

	}

}
