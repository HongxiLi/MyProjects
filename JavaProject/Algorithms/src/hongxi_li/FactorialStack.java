package hongxi_li;

import java.util.Stack;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 1/31/19 11:40 PM
 */
public class FactorialStack {
    static int factorial(int n) {
        if (n == 0)
            return 1;
        else
            return (n * factorial(n - 1));
    }

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
        int fact = 1;
        int factStack = 1;
        int number = 7;
        fact = factorial(number);
        factStack = factorialStack(number);
        System.out.println("Factorial of " + number + " is: " + fact);
        System.out.println("FactorialStack of " + number + " is: " + factStack);
    }
}