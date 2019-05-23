/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 11:55:17 AM
 */
package hongxi_li;

public class Homework2_5 {
	
	static int sumDigits(int m) 
    { 
        return m == 0 ? 0 : m%10 +  
                  sumDigits(m/10) ; 
    } 
  
     
    public static void main(String[] args) 
    { 
    int n = 26397; 
  
    System.out.println(sumDigits(n)); 
    } 

}
