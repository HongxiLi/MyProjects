package q2;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2019-03-19 17:24
 */
public class BruteForceSubstringSearch {

    public static int search(String text, String pattern){

        int lengthOfText = text.length();
        int lengthOfPattern = pattern.length();

        for( int i = 0; i <= lengthOfText - lengthOfPattern ; i++){

            int j;

            for( j=0;j<lengthOfPattern;j++){
                if( text.charAt(i+j) != pattern.charAt(j)){
                    break;
                }
            }

            if( j == lengthOfPattern ) return i;
        }

        return lengthOfText;
    }

    public static void main(String[] args){

        System.out.println(search("ABCADCBABABCDABCDABDE", "BCD"));
    }
}
