/**
 * Project: Lab1
 * File: VinylRecordAlbum.java
 * Date: Jan 14, 2017
 * Time: 8:06:34 PM
 */
package a00998715.data.music;

import a00998715.data.MusicMedia;

/**
 * A vinyl record album.
 * 
 * @author Edgar Zapeka, A00998715
 */
public class VinylRecordAlbum extends MusicMedia {

	public static final int STANDARD_WEIGHT = 120;
	int numberOfTracks;
	int weight;

	/**
	 * Default constructor
	 */
	public VinylRecordAlbum() {
	}

	/**
	 * Constructor allowing all the attributes to be set, except for the weight. The weight is set to STANDARD_WEIGHT.
	 * 
	 * @param title
	 *            the title to set
	 * @param artist
	 *            the artist to set
	 * @param numberOfTracks
	 *            the number of tracks to set
	 */
	public VinylRecordAlbum(String title, String artist, int numberOfTracks) {
		setTitle(title);
		setArtist(artist);
		setNumberOfTracks(numberOfTracks);
		this.weight = STANDARD_WEIGHT;
	}

	/**
	 * Constructor allowing all the attributes to be set.
	 * 
	 * @param title
	 *            the title to set
	 * @param artist
	 *            the artist to set
	 * @param numberOfTracks
	 *            the number of tracks to set
	 * @param weight
	 *            the weight to set
	 */
	public VinylRecordAlbum(String title, String artist, int numberOfTracks, int weight) {
		setTitle(title);
		setArtist(artist);
		setNumberOfTracks(numberOfTracks);
		setWeight(weight);
	}

	/**
	 * Get the number of tracks
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

	/**
	 * Get the weight.
	 * 
	 * @return the weight as an int
	 */
	public int getWeight() {
		return weight;
	}

	/**
	 * Sets the weight. Only weight greater than STANDARD_WEIGHT are allowed.
	 * 
	 * @param weight
	 *            the weight to set
	 */
	public void setWeight(int weight) {
		if (weight > STANDARD_WEIGHT) {
			this.weight = weight;
		} else {
			System.out.println("Only weight greater than 120 are allowed.");
		}
	}

	@Override
	public String toString() {
		return "VinylRecordAlbum [numberOfTracks=" + numberOfTracks + ", weight=" + weight + ", title=" + title + ", artist=" + artist + "]";
	}

	/**
	 * Plays a vinyl record album. For now, it needs only to output a message to the console indicating that a record is being played.
	 */
	@Override
	public void play() {
		System.out.println("A record is being played.");
	}

}
