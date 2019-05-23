package hongxi_li;

import edu.princeton.cs.algs4.MinPQ;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 1/31/19 12:47 AM
 */
public class Homework3_2_d
{
    public static int R = 256;
    public static final int asciiLength = 8;
    public static String bitStreamOfTrie = "";
    public static int lengthOfText = 0;

    private static String next = "";

    /**
     * 霍夫曼单词查找树中的结点
     *
     */
    private static class Node implements Comparable<Node>
    {
        private char ch;    
        private int freq;   
        private final Node left, right;

        Node(char ch, int freq, Node left, Node right)
        {
            this.ch = ch;
            this.freq = freq;
            this.left = left;
            this.right = right;
        }

        public boolean isLeaf()
        {
            return left == null && right == null;
        }

        public int compareTo(Node that)
        {
            return this.freq - that.freq;
        }
    }

   
    public static String expand(String bitSteam, int length, String huffmanCode)
    {
        Node root = null;
        if(bitSteam == "")
        {
            return "";
        }
        else
        {
            root = readTrie(bitSteam);
        }

        int j = 0;
        String text = "";
        for(int i = 0; i < length; i++)
        {
            Node x = root;
            while(!x.isLeaf())
            {
                if(huffmanCode.substring(j, j+1).equals("1"))
                {
                    x = x.right;
                }
                else
                {
                    x = x.left;
                }
                j++;
            }
            text +=x.ch;
        }
        return text;
    }

 
    public static String compress(String s)
    {
        
        char[] input = s.toCharArray();


        int[] freq = new int[R];
        for(int i = 0; i < input.length; i++)
        {
            freq[input[i]]++;
        }

 
        Node root = buildTrie(freq);


        String[] st = new String[R];
        buildCode(st, root, "");

        writeTrie(root);

        lengthOfText = input.length;

        String codeOfHuffman = "";
        for(int i = 0; i < input.length; i ++)
        {
            String code = st[input[i]];
            for(int j = 0; j < code.length(); j++)
            {
                if(code.charAt(j) == '1')
                {
                    codeOfHuffman += '1';
                }
                else
                {
                    codeOfHuffman += '0';
                }
            }
        }
        return codeOfHuffman;
    }


    private static Node buildTrie(int[] freq)
    {
        MinPQ<Node> pq = new MinPQ<Node>(R);
        for(char c = 0; c < R; c++)
        {
            if(freq[c] > 0)
            {
                pq.insert(new Node(c, freq[c], null, null));
            }
        }
        while(pq.size() > 1)
        {
            Node x = pq.delMin();
            Node y = pq.delMin();
            Node parent = new Node('\0', x.freq + y.freq, x, y);
            pq.insert(parent);
        }
        return pq.delMin();
    }


    private static void buildCode(String[] st, Node x, String s)
    {
        if(x.isLeaf())
        {
            st[x.ch] = s;
            return;
        }
        buildCode(st, x.left, s + '0');
        buildCode(st, x.right, s + '1');
    }


    private static void writeTrie(Node x)
    {
        if(x.isLeaf())
        {
            bitStreamOfTrie += '1';
            String temp = Integer.toBinaryString(x.ch);
            int n = asciiLength - temp.length();
            temp = repeatStrings("0", n) + temp;
            bitStreamOfTrie += temp;
            return ;
        }
        bitStreamOfTrie += '0';
        writeTrie(x.left);
        writeTrie(x.right);
    }


    private static Node readTrie(String s)
    {
        if(s.substring(0, 1).equals("1"))
        {
            int value = Integer.parseInt(s.substring(1, 1 + asciiLength),2);
            next = s.substring(1 + asciiLength);
            return new Node((char)value, 0, null, null);
        }
        else
        {
            next = s.substring(1);
            return new Node('\0', 0, readTrie(next), readTrie(next));
        }
    }


    private static String repeatStrings(String s , int n)
    {
        String temp = "";
        for(int i = 0; i < n;i++)
        {
            temp += s;
        }
        return temp;
    }

    public static void main(String[] args)
    {
        String text = "Test is a hard test";
        System.out.println("Input text: " + text);

        String HuffmanCode = Homework3_2_d.compress(text);
        int bitsOfText = Homework3_2_d.lengthOfText * Homework3_2_d.asciiLength;
        String bitStream = Homework3_2_d.bitStreamOfTrie;
        double compressionRatio = 1.0 * HuffmanCode.length() / bitsOfText;

        System.out.println("Huffman Code: " + HuffmanCode);
        System.out.println("BitStream: " + bitStream);
        System.out.println("Huffman Code length(bit): " + HuffmanCode.length());
        System.out.println("Length of text(bit): " + bitsOfText);
        System.out.println("Compression ratio: " + compressionRatio * 100 + "%");

        String expandText = Homework3_2_d.expand(bitStream, lengthOfText, HuffmanCode);
        System.out.println("Expand text: " + expandText);
    }
}