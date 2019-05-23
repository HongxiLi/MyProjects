/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 3:14:26 PM
 */
package hongxi_li;

import java.util.Stack;

public class Homework2_1_a_2 {
	
	
	//Infix One Stack
	public static int calculate(String s) {
        Stack<Long> stack = new Stack<Long>();    
        int len = s.length();
        int i = 0;
        int res = 0;
        long num = 0;
        char sign = '+';
        while(i < len) {
            if(Character.isDigit(s.charAt(i))) {
                num = num * 10 + (s.charAt(i) - '0');
            }
            if(s.charAt(i) == '(') {
                int count = countValid(s.substring(i));
                num = calculate(s.substring(i + 1, i + count));
                i += count;
            }
            
            if(i >= len - 1 || (s.charAt(i) != ' ' && !Character.isDigit(s.charAt(i)))) {
                if(sign == '+')  stack.push(num);
                else if(sign == '-') stack.push(-num);
                else if(sign == '*') stack.push(stack.pop() * num);
                else if(sign == '/') stack.push(stack.pop() / num);
                num = 0;
                sign = s.charAt(i);
            }
            i++;
        }
        
        while(!stack.isEmpty()) {
            res += stack.pop();
        }
        
        return (int)res;
    }
    
    static int countValid(String s){
        int counter = 0;
        int i = 0;
        while(i < s.length()) {
            if(s.charAt(i) =='(') counter ++;
            else if(s.charAt(i) ==')') counter --;
            if(counter == 0) break;
            i++;
        } 
        return i;
    }
    
    public static void main(String[] args) {
	    System.out.println(calculate("(1 + 2 * (20 / 5 )) "));
	    System.out.println(calculate("(1 + 3 + ( ( 4 / 2 ) * ( 8 * 4 ) ))  "));
	    System.out.println(calculate("(4 + 8) * (6 - 5)/((3 - 2) * (2 + 2)) "));
	}
    

}
