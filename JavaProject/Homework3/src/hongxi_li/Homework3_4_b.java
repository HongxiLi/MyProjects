package hongxi_li;

import java.util.Stack;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 2/1/19 12:09 AM
 */
public class Homework3_4_b {
    static public int factorialStack(int n) {
        Stack<Integer> stack = new Stack<Integer>();
        int result = 1;
        while (n > 1) {
            stack.push(n);
            n--;
        }
        while(!stack.isEmpty()) {
            n = stack.pop();
            result = result * n;
            System.out.println(result);
        }
        return result;
    }

    public static void main(String args[]) {
        int factStack = 1;
        int number = 7;
        factStack = factorialStack(number);
        System.out.println("FactorialStack of " + number + " is: " + factStack);
    }
}
