/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 1:57:30 PM
 */
package hongxi_li;

import java.util.Stack;

public class Homework2_1_a_1 {
	
	//Infix Two Stack
	public static int calculate(String s) {
	    if (s == null || s.length() == 0) return 0;
	    Stack<Integer> nums = new Stack<>(); 
	    Stack<Character> ops = new Stack<>(); 
	    for (int i = 0; i < s.length(); i++) {
	        char c = s.charAt(i);
	        if (c == ' ') continue;
	        if (Character.isDigit(c)) {
	            num = c - '0';
	            
	            while (i < s.length() - 1 && Character.isDigit(s.charAt(i+1))) {
	                num = num * 10 + (s.charAt(i+1) - '0');
	                i++;
	            }
	            nums.push(num);
	            num = 0; 
	        } else if (c == '(') {
	            ops.push(c);
	        } else if (c == ')') {
	            
	            while (ops.peek() != '(') nums.push(operation(ops.pop(), nums.pop(), nums.pop()));
	            ops.pop(); 
	        } else if (c == '+' || c == '-' || c == '*' || c == '/') {
	            while (!ops.isEmpty() && precedence(c, ops.peek())) nums.push(operation(ops.pop(), nums.pop(),nums.pop()));
	            ops.push(c);
	        }
	    }
	    while (!ops.isEmpty()) {
	        nums.push(operation(ops.pop(), nums.pop(), nums.pop()));
	    }
	    return nums.pop();
	}

	private static int operation(char op, int b, int a) {
	    switch (op) {
	        case '+': return a + b;
	        case '-': return a - b;
	        case '*': return a * b;
	        case '/': return a / b; 
	    }
	    return 0;
	}
	
	private static boolean precedence(char op1, char op2) {
	    if (op2 == '(' || op2 == ')') return false;
	    if ((op1 == '*' || op1 == '/') && (op2 == '+' || op2 == '-')) return false;
	    return true;
	}

	public static void main(String[] args) {
	    System.out.println(calculate("(1 + 2 * (20 / 5 )) "));
	    System.out.println(calculate("(1 + 3 + ( ( 4 / 2 ) * ( 8 * 4 ) ))  "));
	    System.out.println(calculate("(4 + 8) * (6 - 5)/((3 - 2) * (2 + 2)) "));
	}

}
