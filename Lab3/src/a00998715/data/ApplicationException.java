/**
 * Project: Lab3
 * File: ApplicationException.java
 * Date: Jan 28, 2017
 * Time: 10:15:42 PM
 */
package a00998715.data;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
@SuppressWarnings("serial")
public class ApplicationException extends Exception {

	public ApplicationException() {
		super();
	}

	public ApplicationException(String message, Throwable cause, boolean enableSuppression, boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}

	public ApplicationException(String message, Throwable cause) {
		super(message, cause);
	}

	public ApplicationException(String message) {
		super(message);
	}

	public ApplicationException(Throwable cause) {
		super(cause);
	}

	@Override
	public String toString() {
		return super.getMessage();
	}

}
