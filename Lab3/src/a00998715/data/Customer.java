/**
 * Project: Lab2
 * File: Customer.java
 * Date: Jan 22, 2017
 * Time: 3:22:12 PM
 */
package a00998715.data;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public class Customer {
	private int id;
	private String firstName;
	private String lastName;
	private String streetName;
	private String city;
	private String postalCode;
	private String phoneNumber;
	private String email;
	private String date;

	public int getId() {
		return id;
	}

	/**
	 * Use Builder to set id
	 * 
	 * @param id
	 */
	@Deprecated
	public void setId(int id) {
		this.id = id;
	}

	public String getFirstName() {
		return firstName;
	}

	/**
	 * Use Builder to set firstName
	 * 
	 * @param firstName
	 */
	@Deprecated
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	/**
	 * Use Builder to set lastName
	 * 
	 * @param lastName
	 */
	@Deprecated
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public String getStreetName() {
		return streetName;
	}

	/**
	 * Use Builder to set streetName
	 * 
	 * @param streetName
	 */
	@Deprecated
	public void setStreetName(String streetName) {
		this.streetName = streetName;
	}

	public String getCity() {
		return city;
	}

	/**
	 * Use Builder to set city
	 * 
	 * @param city
	 */
	@Deprecated
	public void setCity(String city) {
		this.city = city;
	}

	public String getPostalCode() {
		return postalCode;
	}

	/**
	 * Use Builder to set postalCode
	 * 
	 * @param postalCode
	 */
	@Deprecated
	public void setPostalCode(String postalCode) {
		this.postalCode = postalCode;
	}

	public String getPhoneNumber() {
		return phoneNumber;
	}

	/**
	 * Use Builder to set phoneNumber
	 * 
	 * @param phoneNumber
	 */
	@Deprecated
	public void setPhoneNumber(String phoneNumber) {
		this.phoneNumber = phoneNumber;
	}

	public String getEmail() {
		return email;
	}

	/**
	 * Use Builder to set email
	 * 
	 * @param email
	 */
	@Deprecated
	public void setEmail(String email) {
		this.email = email;
	}

	/**
	 * Use Builder to set date
	 * 
	 * @param date
	 */
	@Deprecated
	public void setDate(String date) {
		this.date = date;
	}

	public String getDate() {
		return date;
	}

	public static class Builder {
		private int id;
		private String firstName;
		private String lastName;
		private String streetName;
		private String city;
		private String postalCode;
		private String phoneNumber;
		private String email;
		private String date;

		public Builder(int id, String phoneNumber) {
			this.id = id;
			this.phoneNumber = phoneNumber;
		}

		public Builder firstName(String val) {
			firstName = val;
			return this;
		}

		public Builder lastName(String val) {
			lastName = val;
			return this;
		}

		public Builder streetName(String val) {
			streetName = val;
			return this;
		}

		public Builder city(String val) {
			city = val;
			return this;
		}

		public Builder postalCode(String val) {
			postalCode = val;
			return this;
		}

		public Builder email(String val) {
			email = val;
			return this;
		}

		public Customer build() {
			return new Customer(this);
		}

		public Builder date(String val) {
			date = val;
			return this;
		}
	}

	private Customer(Builder builder) {
		id = builder.id;
		firstName = builder.firstName;
		lastName = builder.lastName;
		streetName = builder.streetName;
		city = builder.city;
		postalCode = builder.postalCode;
		phoneNumber = builder.phoneNumber;
		email = builder.email;
		date = builder.date;
	}

	@Override
	public String toString() {
		return "Customer [id=" + id + ", firstName=" + firstName + ", lastName=" + lastName + ", streetName=" + streetName + ", city=" + city
				+ ", postalCode=" + postalCode + ", phoneNumber=" + phoneNumber + ", email=" + email + "]";
	}

}
