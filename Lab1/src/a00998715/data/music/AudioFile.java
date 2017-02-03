/**
 * Project: Lab1
 * File: AudioFile.java
 * Date: Jan 14, 2017
 * Time: 7:40:59 PM
 */
package a00998715.data.music;

import a00998715.data.MusicMedia;
import a00998715.io.FileManager;

/**
 * An Audio File.
 * 
 * @author Edgar Zapeka, A00998715
 */
public class AudioFile extends MusicMedia implements FileManager {

	String fileName;
	double fileSize;

	/**
	 * Default constructor
	 */
	public AudioFile() {
	}

	/**
	 * Constructor allowing all the attributes to be set.
	 * 
	 * @param title
	 *            the title to set
	 * @param artist
	 *            the artist to set
	 * @param fileName
	 *            the filename to set
	 * @param fileSize
	 *            the size of the file
	 */
	public AudioFile(String title, String artist, String fileName, double fileSize) {
		setTitle(title);
		setArtist(artist);
		setFileName(fileName);
		setFileSize(fileSize);
	}

	/**
	 * Get the filename.
	 * 
	 * @return the fileName as a String
	 */
	public String getFileName() {
		return fileName;
	}

	/**
	 * Set the filename.
	 * 
	 * @param fileName
	 *            the fileName to set
	 */
	public void setFileName(String fileName) {
		this.fileName = fileName;
	}

	/**
	 * Get the file size.
	 * 
	 * @return the fileSize as a double
	 */
	public double getFileSize() {
		return fileSize;
	}

	/**
	 * Set the file size
	 * 
	 * @param fileSize
	 *            the fileSize to set
	 */
	public void setFileSize(double fileSize) {
		this.fileSize = fileSize;
	}

	/**
	 * Plays an audio file. For now, it needs only to output a message to the console indicating that the audio file is being played.
	 */
	@Override
	public void play() {
		System.out.println("The audio file is being played.");
	}

	/**
	 * Saves a file to the hard disk. For now, it needs only to output a message to the console indicating that the audio file is being saved.
	 * 
	 * @param path
	 *            the directory to save to
	 * @param fileName
	 *            the name of the file being saved
	 */
	@Override
	public void save(String path, String fileName) {
		System.out.println("The audio file " + fileName + " " + " is being saved in " + path);
	}

	/**
	 * Deletes a file from the hard disk. For now, it needs only to output a message to the console indicating that the audio file is being deleted.
	 * 
	 * @param path
	 *            the directory where the file is located
	 * @param fileName
	 *            the name of the file to be deleted
	 */
	@Override
	public void delete(String path, String fileName) {
		System.out.println("The audio file " + fileName + " " + "is being deleted from " + path);
	}

	@Override
	public String toString() {
		return "AudioFile [fileName=" + fileName + ", fileSize=" + fileSize + ", title=" + title + ", artist=" + artist + "]";
	}

}
