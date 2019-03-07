package hongxi_li;

import java.util.Stack;

/**
 * @author: Hongxi Li
 * @ID: 001893090
 * @Date: 1/31/19 7:25 PM
 */
public class Homework3_4_a {
    public static void main(String[] args) {
        System.out.println(factorial(5));   // Returns 120
    }

    private static int factorial(int num) {
        if (num == 1) {
            return 1;
        }
        return num * factorial(num - 1);
    }
}

