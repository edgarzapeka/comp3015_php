/**
 * Project: Lab1
 * File: Lab1.java
 * Date: Jan 14, 2017
 * Time: 12:05:25 PM
 * 
 * asdsadas
 */
package a00998715;

import a00998715.data.music.AudioFile;
import a00998715.data.music.CompactDisk;
import a00998715.data.music.VinylRecordAlbum;

/**
 * This program demonstrates an understanding of the purpose and use object oriented design, including the use of
 * interfaces, abstract parent classes, and inheritance. It also demonstrates the use of code commenting, and the
 * purpose and correct use oftoString(). The Lab1 class tests the validation process, including values that are out of
 * range. Finally, all of the code demonstrates proper coding practices.
 * 
 * @author Edgar Zapeka, A00998715
 * 
 */
public class Lab1 {

	/**
	 * Tests MusicMedia objects.
	 */
	public void test() {
		VinylRecordAlbum spinMe1 = new VinylRecordAlbum("Spin me", "The Spinners", 12, 80);
		VinylRecordAlbum spinMe2 = new VinylRecordAlbum("Spin me", "The Spinners", 12, 120);
		VinylRecordAlbum spinMe3 = new VinylRecordAlbum("Spin me", "The Spinners", 12, 180);
		System.out.println(spinMe1.getWeight() + "\n" + spinMe2.getWeight() + "\n" + spinMe3.getWeight());
		spinMe3.play();

		CompactDisk turnaboutIntruder = new CompactDisk("Turnabout Intuder", "Jim Kirk", 9);
		turnaboutIntruder.play();

		AudioFile buzzClick = new AudioFile("Buzz-Click", "Cyber Punks", "Wish I Bought Vinyl.m4a", 3.46);
		buzzClick.save("C:/My Music/itunes", "Wish I Bought Vinyl.m4a");
		buzzClick.play();
		buzzClick.delete("C:/My Music/itunes", "Wish I Bought Vinyl.m4a");
	}

	/**
	 * The main driver for Lab1.
	 * 
	 * @param args
	 *            not used in this application
	 */
	public static void main(String[] args) {
		Lab1 testCase = new Lab1();
		testCase.test();
	}

}
