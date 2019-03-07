package hongxi_li;
/**
 * @author: Hongxi Li
 * @id: 001893090
 * @Date: 3:58:41 PM
 */


import java.util.Stack;

public class EvaluatePostfix {
	
	
	//Evaluate Postfix
	static int evaluatePostfix(String exp)
    {
        //create a stack
        Stack<Integer> stack=new Stack<>();
          
        // Scan all characters one by one
        for(int i=0;i<exp.length();i++)
        {
            char c=exp.charAt(i);

            // If the scanned character is an operand (number here),
            // push it to the stack.
            if(Character.isDigit(c))
            stack.push(c - '0');
              
            //  If the scanned character is an operator, pop two
            // elements from stack apply the operator
            else
            {   int val1 = stack.pop();
                int val2 = stack.pop();                 
                switch(c)
                {
                    case '+': stack.push(val2+val1); break;                      
                    case '-': stack.push(val2- val1); break;                      
                    case '/': stack.push(val2/val1); break;                      
                    case '*': stack.push(val2*val1); break;
              }
            }
        }
        return stack.pop();     
    }
      
    // Driver program to FactorialStack above functions
    public static void main(String[] args)  
    {
        String exp="35+2*83*+";
        System.out.println("postfix evaluation: "+evaluatePostfix(exp));
    }
}
