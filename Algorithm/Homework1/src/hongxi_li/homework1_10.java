package hongxi_li;

import java.util.Scanner;

import edu.princeton.cs.algs4.Stack;


public class homework1_10 {

	public static void main(String[] args) {  
        Stack<String> ops = new Stack<String>();  
        Stack<Double> vals = new Stack<Double>();  
        Scanner scanner = new Scanner(System.in);  
        while(scanner.hasNext()) {  
            String s = scanner.nextLine();  
            if(s.equals("("));  
            else if(s.equals("+")) ops.push(s);  
            else if(s.equals("-")) ops.push(s);  
            else if(s.equals("*")) ops.push(s);  
            else if(s.equals("/")) ops.push(s);  
            else if(s.equals("sqrt")) ops.push(s);  
            else if(s.equals(")")) {  
                String op = ops.pop();  
                double v = vals.pop();  
                if(op.equals("+")) v = vals.pop() + v;  
                else if(op.equals("-")) v = vals.pop() - v;  
                else if(op.equals("*")) v = vals.pop() * v;  
                else if(op.equals("/")) v = vals.pop() / v;  
                else if(op.equals("sqrt")) v = Math.sqrt(v);  
                vals.push(v);  
            }  
            else vals.push(Double.parseDouble(s));  
        }  
        System.out.println(vals.pop());  
    }  

}
