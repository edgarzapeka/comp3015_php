/**
 * Project: Lab1
 * File: FileManager.java
 * Date: Jan 14, 2017
 * Time: 12:28:54 PM
 */
package a00998715.io;

/**
 * Manage files.
 * 
 * @author Edgar Zapeka, A00998715
 */
public interface FileManager {

	/**
	 * Delete a file.
	 * 
	 * @param path
	 *            the directory where the file is located
	 * @param fileName
	 *            the name of the file to be deleted
	 */
	void delete(String path, String fileName);

	/**
	 * Save a file.
	 * 
	 * @param path
	 *            the directory to save to
	 * @param fileName
	 *            the name of the file being saved
	 */
	void save(String path, String fileName);
}
