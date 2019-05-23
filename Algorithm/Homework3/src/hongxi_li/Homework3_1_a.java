package hongxi_li;
import java.util.Random;

/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 7:45:12 PM
 */

public class Homework3_1_a {
	
	public static final String allChar = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
    public static String generateString(int length) {
        StringBuffer sb = new StringBuffer();  
        Random random = new Random();  
        for (int i = 0; i < length; i++) {  
            sb.append(allChar.charAt(random.nextInt(allChar.length())));
        }  
        return sb.toString();  
    }  
    
    public static void main(String[] args) {

    	for (int i = 0; i < 2000; i++) {
		      String str1 = generateString(500);
		      //a.字符串迭代
		      String result1 = "";
		      for (int j = str1.length() - 1; j >= 0; j--) {
		         char c = str1.charAt(j);
		         result1 = result1 + c;
		      }
		      System.out.println("@String:"+result1);
		   }		  
		}


}
