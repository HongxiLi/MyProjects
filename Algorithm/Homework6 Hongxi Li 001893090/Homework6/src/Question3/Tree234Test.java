package Question3;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Iterator;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/22/19 10:32 PM
 */
public class Tree234Test {
    public static void main(String[] args) throws IOException {
        String value;
        Tree234<String> theTree = new Tree234<String>();

        theTree.insert("A");
        theTree.insert("G");
        theTree.insert("F");
        theTree.insert("B");
        theTree.insert("K");
        theTree.insert("D");
        theTree.insert("H");
        theTree.insert("M");
        theTree.insert("J");
        theTree.insert("E");
        theTree.insert("S");
        theTree.insert("I");
        theTree.insert("R");
        theTree.insert("X");
        theTree.insert("C");
        theTree.insert("L");
        theTree.insert("N");
        theTree.insert("T");
        theTree.insert("U");
        theTree.insert("P");

        Iterator iter =  theTree.iterator();
        while(true) {
            System.out.println("Enter first letter of ");
            System.out.println("show, insert, remove, next element, height or find");
            char choice = getChar();
            switch(choice)
            {
                case 's':
                    theTree.displayTree();
                    break;
                case 'r':
                    System.out.print("Enter value to remove: ");
                    value  = getString();
                    theTree = theTree.remove(value);
                    break;
                case 'i':
                    System.out.print("Enter value to insert: ");
                    value  = getString();
                    Node found = theTree.find(value);
                    if (found!=null) {
                        System.out.println("This element is already in the tree");
                    } else {
                        theTree.insert(value);
                        iter = theTree.iterator();
                    }
                    break;
                case 'n':
                    if (iter.hasNext())
                        System.out.println(iter.next());
                    else {
                        System.out.println("This is the end...");
                    }
                    break;
                case 'h':
                    System.out.println(theTree.height()+ " levels");
                    break;
                case 'f':
                    System.out.print("Enter value to find: ");
                    value = getString();
                    Node find = theTree.find(value);
                    if(find!=null)
                        System.out.println("Found " + value);
                    else
                        System.out.println("Could not find "+value);
                    break;
                default:
                    System.out.print("Invalid entry\n");
            }
        }
    }
    public static String getString() throws IOException {
        InputStreamReader isr = new InputStreamReader(System.in);
        BufferedReader br = new BufferedReader(isr);
        String s = br.readLine();
        return s;
    }

    public static char getChar() throws IOException {
        String s = getString();
        return s.charAt(0);
    }

    public static int getInt() throws IOException {
        String s = getString();
        return Integer.parseInt(s);
    }

}

