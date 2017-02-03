/**
 * Project: Lab1
 * File: CompactDisk.java
 * Date: Jan 14, 2017
 * Time: 7:58:22 PM
 */
package a00998715.data.music;

import a00998715.data.MusicMedia;

/**
 * A Compact Disk.
 * 
 * @author Edgar Zapeka, A00998715
 */
public class CompactDisk extends MusicMedia {

	int numberOfTracks;

	/**
	 * Default constructor
	 */
	public CompactDisk() {

	}

	/**
	 * Constructor allowing all the attributes to be set.
	 * 
	 * @param title
	 *            to set the title
	 * @param artist
	 *            to set the artist
	 * @param numberOfTracks
	 *            to set the number of tracks
	 */
	public CompactDisk(String title, String artist, int numberOfTracks) {
		setTitle(title);
		setArtist(artist);
		setNumberOfTracks(numberOfTracks);
	}

	/**
	 * Plays a CD. For now, it needs only to output a message to the console indicating that the CD is being played.
	 */
	@Override
	public void play() {
		System.out.println("The CD is being played");
	}

	/**
	 * Get the number of tracks.
	 * 
	 * @return the numberOfTracks as an int
	 */
	public int getNumberOfTracks() {
		return numberOfTracks;
	}

	/**
	 * Set the number of tracks.
	 * 
	 * @param numberOfTracks
	 *            the numberOfTracks to set
	 */
	public void setNumberOfTracks(int numberOfTracks) {
		this.numberOfTracks = numberOfTracks;
	}

	@Override
	public String toString() {
		return "CompactDisk [numberOfTracks=" + numberOfTracks + ", title=" + title + ", artist=" + artist + "]";
	}

}
