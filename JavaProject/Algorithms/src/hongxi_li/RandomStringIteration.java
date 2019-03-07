package hongxi_li;
import java.util.Random;

/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 7:45:12 PM
 */

public class RandomStringIteration {
	
	public static final String allChar = "0123456789" +
            "abcdefghijklmnopqrstuvwxyz" +
            "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
    public static String generateString(int length) {  
        StringBuffer sb = new StringBuffer();  
        Random random = new Random();  
        for (int i = 0; i < length; i++) {  
            sb.append(allChar.charAt(random.nextInt(allChar.length())));  
//            //把生成的字符建立索引
//            int index = random.nextInt(allChar.length());
//            //通过索引存入字符
//            char oc = allChar.charAt(index);
//            sb.append(oc); 
//            System.out.println(oc);
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
		   //b.StringBuilder迭代
		   String str2 = generateString(500);
		   StringBuilder stringBuilder = new StringBuilder(str2);
		   String result2 = stringBuilder.reverse().toString();
		   System.out.println("@Builder:"+result2);
		}

}
