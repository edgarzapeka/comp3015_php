/**
 * Project: Lab1
 * File: MusicMedia.java
 * Date: Jan 14, 2017
 * Time: 7:39:43 PM
 */
package a00998715.data;

/**
 * @author Edgar Zapeka, A00998715
 *
 */
public abstract class MusicMedia {
	protected String title;
	protected String artist;

	/**
	 * default constructor
	 */
	public MusicMedia() {
	}

	/**
	 * @param title
	 *            used to set the title field
	 * @param artist
	 *            used to set the artist field
	 */
	public MusicMedia(String title, String artist) {
		setTitle(title);
		setArtist(artist);
	}

	/**
	 * @return the title as a String
	 */
	public String getTitle() {
		return title;
	}

	/**
	 * 
	 * @param title
	 *            the title to set
	 */
	public void setTitle(String title) {
		this.title = title;
	}

	/**
	 * @return the artist as a String
	 */
	public String getArtist() {
		return artist;
	}

	/**
	 * @param artist
	 *            the artist to set
	 */
	public void setArtist(String artist) {
		this.artist = artist;
	}

	@Override
	public String toString() {
		return "MusicMedia [title=" + title + ", artist=" + artist + "]";
	}

	/**
	 * abstract method to be implemented by sub classes. Used to play a music media type.
	 */
	public abstract void play();
}
