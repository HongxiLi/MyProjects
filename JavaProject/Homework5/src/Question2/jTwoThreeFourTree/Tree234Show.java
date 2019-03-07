package Question2.jTwoThreeFourTree;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/15/19 11:42 PM
 */
public class Tree234Show {
    public static void main(String[] args) throws IOException
    {
        long value;
        Tree234 theTree = new Tree234();

        //3,7,9,23,45,1,5,14,55,24,13,11,8,19,4,31,35,56

        theTree.insert(3);
        theTree.insert(7);
        theTree.insert(9);
        theTree.insert(23);
        theTree.insert(45);
        theTree.insert(1);
        theTree.insert(5);
        theTree.insert(14);
        theTree.insert(55);
        theTree.insert(24);
        theTree.insert(13);
        theTree.insert(11);
        theTree.insert(8);
        theTree.insert(19);
        theTree.insert(4);
        theTree.insert(31);
        theTree.insert(35);
        theTree.insert(56);

        while(true)
        {
            System.out.print("Enter first letter of ");
            System.out.print("show, insert, or find: ");
            char choice = getChar();
            switch(choice)
            {
                case 's':
                    theTree.displayTree();
                    break;
                case 'i':
                    System.out.print("Enter value to insert: ");
                    value = getInt();
                    theTree.insert(value);
                    break;
                case 'f':
                    System.out.print("Enter value to find: ");
                    value = getInt();
                    int found = theTree.find(value);
                    if(found != -1)
                        System.out.println("Found "+value);
                    else
                        System.out.println("Could not find "+value);
                    break;
                default:
                    System.out.print("Invalid entry\n");
            }  // end switch
        }  // end while
    }  // end main()
    //--------------------------------------------------------------
    public static String getString() throws IOException
    {
        InputStreamReader isr = new InputStreamReader(System.in);
        BufferedReader br = new BufferedReader(isr);
        String s = br.readLine();
        return s;
    }
    //--------------------------------------------------------------
    public static char getChar() throws IOException
    {
        String s = getString();
        return s.charAt(0);
    }

    //-------------------------------------------------------------
    public static int getInt() throws IOException
    {
        String s = getString();
        return Integer.parseInt(s);
    }
}
