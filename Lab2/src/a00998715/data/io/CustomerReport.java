/**
 * Project: Lab2
 * File: CustomerReport.java
 * Date: Jan 22, 2017
 * Time: 3:41:43 PM
 */
package a00998715.data.io;

import java.util.ArrayList;

import a00998715.data.Customer;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class CustomerReport {
	private ArrayList<Customer> listOfCustomers = new ArrayList<Customer>();

	public void addCustomer(Customer customer) {
		listOfCustomers.add(customer);
	}

	public void print() {

		System.out.println(
				"-----------------------------------------------------------------------------------------------------------------------------------------------");
		System.out.format(" %2s %-6s %-15s %-15s %-25s %-15s %-15s %-15s %-15s\n", "#.", "ID", "First Name", "Last Name", "Street", "City",
				"Postal Code", "Phone", "Email");
		System.out.println(
				"-----------------------------------------------------------------------------------------------------------------------------------------------");

		int counter = 1;
		for (Customer i : listOfCustomers) {
			System.out.format("%3s %06d %-15s %-15s %-25s %-15s %-15s %-15s %-15s\n", counter++ + ".", i.getId(), i.getFirstName(), i.getLastName(),
					i.getStreetName(), i.getCity(), i.getPostalCode(), i.getPhoneNumber(), i.getEmail());
		}
	}
}
