package q2;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-19 19:24
 */
public class RobinKarpSubstringSearch {
    public final static int d = 256;

    //q -> A prime number
    static void search(String pat, String txt, int q)
    {
        int M = pat.length();
        int N = txt.length();
        int i, j;
        int p = 0; // hash value for pattern
        int t = 0; // hash value for txt
        int h = 1;

        for (i = 0; i < M-1; i++)
            h = (h*d)%q;

        for (i = 0; i < M; i++)
        {
            p = (d*p + pat.charAt(i))%q;
            t = (d*t + txt.charAt(i))%q;
        }

        // Slide the pattern over text one by one
        for (i = 0; i <= N - M; i++)
        {

            if ( p == t )
            {
                for (j = 0; j < M; j++)
                {
                    if (txt.charAt(i+j) != pat.charAt(j))
                        break;
                }

                if (j == M)
                    System.out.println("Pattern found at index " + i);
            }

            if ( i < N-M )
            {
                t = (d*(t - txt.charAt(i)*h) + txt.charAt(i+M))%q;

                if (t < 0)
                    t = (t + q);
            }
        }
    }

    /* Driver program to test above function */
    public static void main(String[] args)
    {
        String txt = "ABCADCBABABCDABCDABDE";
        String pat = "BCD";
        int q = 101; // A prime number
        search(pat, txt, q);
    }
}
